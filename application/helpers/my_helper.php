<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	// load file javascript
	function load_js($path){return '<script src="'.base_url().'assets/js/'.$path.'"></script>';}
	// load file css
	function load_css($path){return '<link rel="stylesheet" href="'.base_url().'assets/css/'.$path.'">';}


	function check_login()
	{
		$CI =& get_instance();
		if ($CI->session->userdata('login')!='ok') {
			redirect('login','refresh');
		}
	}


	function get_menu($parent='')
	{
		$CI =& get_instance();
		$CI->db->where('up', $parent)
			->where('flag_menu', '1')
			->order_by('order', 'asc');

		if (is_role('admin')) {
			$CI->db->group_start()
				->where('role <>', 'siswa')
				->or_where('role', 'global')
				->or_where('role', 'admin')
				->group_end();
		}

		if (is_role('verifikator')) {
			$CI->db->select('sys_modul.*');
			$CI->db->join('sys_privileges', 'sys_privileges.modul_id = sys_modul.id')
				->join('sys_usergroup', 'sys_usergroup.group_id = sys_privileges.group_id');
			$CI->db->where('sys_usergroup.user_id', my_id());
			$CI->db->group_by('sys_modul.id');
		}

		if (is_role('siswa')) {
			$CI->db->where('role', 'siswa');
		}

		$q = $CI->db->get('sys_modul');
		$data = $q->result_array();
		if ($CI->session->userdata('login')!='ok' ) {
			$data = [];
		}
		if (!empty($data)) {
			$i=0;
			foreach ($data as $row) {
				$data[$i]['child'] = get_menu($row['code']);
				$i++;
			}
		}
		return $data;
	}

	function url_menu($url='')
	{
		$link = $url=='#' ? 'javascript:void(0);' :  base_url().$url;
		return $link;
	}

	function encrypt($name, $ciphertext)
	{
		$CI =& get_instance();
		$CI->load->library('Encryptbap');
		$CI->encryptbap->generatekey_once($name);
				$result = $CI->encryptbap->encrypt_urlsafe($ciphertext, "json");
				return $result;
	}
	function decrypt($name, $ciphertext)
	{
		$CI =& get_instance();
		$CI->load->library('Encryptbap');
		$result = json_decode($CI->encryptbap->decrypt_urlsafe($name, $ciphertext));
		return $result;
	}

	function check_login_siswa()
	{
		$CI =& get_instance();
		if (empty($CI->session->userdata('seslog')) OR ($CI->session->userdata('ui')!=decrypt('SESS',$CI->session->userdata('seslog'))) ) {
			redirect('siswa/login','refresh');
		}
	}
	function id_login_siswa()
	{
		$CI =& get_instance();
		return decrypt('LOGINSISWA',$CI->session->userdata('ui'));
	}

	function ifnull($input, $alternative)
	{
			return (!isset($input) || is_null($input) || trim($input) == "" || trim($input) == "undefined" || trim($input) == "null") ? $alternative : $input;
	}

	function have_privileges($modul_code)
	{
		$CI =& get_instance();
		$CI->db->select('sys_modul.id')
			->join('sys_privileges', 'sys_usergroup.group_id = sys_privileges.group_id')
			->join('sys_modul', 'sys_modul.id = sys_privileges.modul_id')
			->where('sys_usergroup.user_id', my_id())
			->where('sys_modul.code', $modul_code);
		$q = $CI->db->get('sys_usergroup');
		$tot = $q->num_rows();
		$access = FALSE;
		if ($tot > 0 || is_role('admin')) {
			$access = TRUE;
		}
		return $access;
	}

	function my_id()
	{
		$CI =& get_instance();
		return $CI->session->userdata('user_id');
	}

	function is_role($role="admin")
	{
		$CI =& get_instance();
		return $CI->session->userdata('role') == $role ? TRUE : FALSE;
	}

	function replace_name_file($text='')
	{
		$find = strripos($text, '.');
		$hasil1 = substr($text, 0,$find);
		$rplc1 = preg_replace('/[^a-zA-Z0-9]/','_', $hasil1);
		$rplc2 = preg_replace('/_+/', '_', $rplc1);

		if (strlen($rplc2)>10) {
			$rplc2 = substr($rplc2, 0,10);
			if (strlen($rplc2)==strripos($rplc2,'_')+1) {
				$rplc2 = substr($rplc2, 0,strripos($rplc2,'_'));
			}
		}

		$hasil2 = substr($text, $find);
		$hasil_rplc = $rplc2.$hasil2;
		return $hasil_rplc;
	}

	function random_text($length=10)
	{
		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$count = mb_strlen($chars);

		for ($i = 0, $result = ''; $i < $length; $i++) {
			$index = rand(0, $count - 1);
			$result .= mb_substr($chars, $index, 1);
		}
		// $result = enkripsi($result);
		return $result;
	}

	function upload_file($name='',$path='', $options=array())
	{
		$CI =& get_instance();

		$arr = array();
		$get_nama = replace_name_file($_FILES[$name]['name']);

		$new_name = date('Ymd').$get_nama;

		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
		$config['file_name'] = $new_name;
		$config['max_size']  = '0';
		$config['max_width']  = '0';

		if (!empty($options)) {
			foreach ($options as $key => $value) {
				$config[$key] = $value;
			}
		}
		
		$CI->load->library('upload', $config);
		
		if ($CI->upload->do_upload($name)) {
			$data = array('upload_data' => $CI->upload->data());
			$file_name = $data['upload_data']['file_name'];
			$arr = array(
				'error'	=> false,
				'file_name' => $file_name
			);
		} else {
			$arr = array('error' => $CI->upload->display_errors());
			// return false;
		}
		return $arr;
	}

	function datesql_fromtglindo($date)
	{
		$exp = explode("/", $date);
		return $exp[2].'-'.$exp[1].'-'.$exp[0];
	}

	
	function label_status($status)
	{
		$label = ['draft'=>'label-default','reject'=>'label-danger','review'=>'label-primary','approve'=>'label-success'];
		return $label[$status];
	}
	function status($status)
	{
		$sts = ['draft'=>'Belum Dikirim','reject'=>'Ditolak','review'=>'Proses','approve'=>'Diterima'];
		return $sts[$status];
	}
	function enum_jumlahpeserta($jumlah)
	{
		$hasil = ['perorangan'=>'Perorangan/Double','beregu'=>'Beregu(2-11)','massal'=>'Massal'];
		return $hasil[$jumlah];
	}