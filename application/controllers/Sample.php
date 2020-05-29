<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index() //dashboard
	{
		//load js
		$this->page_js  = load_js('pages/dashboard.js');
		// $this->page_js .= load_js('demo.js');
		// load plugins
		$this->plugins  = [PLUG_CHARTJS,PLUG_ICHECK,PLUG_DATERANGEPICKER,PLUG_SPARKLINE,PLUG_JQVMAP,PLUG_JQUERYUI,PLUG_JQUERYKNOB,PLUG_SUMMERNOTE,PLUG_TEMPUSDOMINUS];
		$data=[];
		// load main content
		$main = $this->parser->parse('sample/dashboard', $data, TRUE);
		// load template
		$this->template($main);
	}
	public function form_general()//form general
	{
		$data   = [];
		$this->page_js = load_js('pages/form_general.js');
		// load plugins
		$this->plugins  = [PLUG_CUSTOMFILEINPUT];
		$main = $this->parser->parse('sample/form_general', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}
	public function form_advanced()//form advanced
	{
		$data   = [];
		// $this->page_js  = load_js('demo.js');
		$this->page_js  = load_js('pages/form_advanced.js');
		// load plugins
		$this->plugins  = [PLUG_DATERANGEPICKER,PLUG_SELECT2,PLUG_ICHECK,PLUG_TEMPUSDOMINUS,PLUG_DATEPICKER,PLUG_COLORPICKER,PLUG_DUALLISTBOX,PLUG_INPUTMASK,PLUG_SWITCH];
		$main = $this->parser->parse('sample/form_advanced', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}
	public function form_validation()//form validation
	{
		$data   = [];
		$this->page_js = load_js('pages/form_validation.js');
		// load plugins
		$this->plugins  = [PLUG_JQUERYVALIDATION];
		$main = $this->parser->parse('sample/form_validation', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}
	public function form_editor()//form editor
	{
		$data   = [];
		$this->page_js = load_js('pages/form_editor.js');
		// load plugins
		$this->plugins  = [PLUG_SUMMERNOTE];
		$main = $this->parser->parse('sample/form_editor', $data, TRUE);
		$this->template($main);//panggil fungsi template di /core/my_controller
	}























	public function data()
	{
		$data = [];
		$arr  = [];
		$condition = [
			
		];

		$list_data = $this->group->datatable($condition);
		if (!empty($list_data)) {
			foreach ($list_data as $row) {
				$column = [
					'id'	=> $row->id,
					'name'	=> $row->group_name,
				];
				$data[] = $column;
			}
		}
		$arr = [
			'rows' => $data,
			'total'	=> $this->group->count_filtered($condition),
			'totalNotFiltered' => $this->group->count_all($condition)
		];
		echo json_encode($arr);
	}

	function privileges($method='get')
	{
		$arr = [];
		switch ($method) {
			case 'update':
				$group_id = $this->input->post('group_id');
				$modul_id = $this->input->post('modul_id');

				$arr_modul_id = explode(',', $modul_id);

				if (!empty($arr_modul_id)) {

					// create array existing modul
					$arr_privileges_modul = [];
					$data_privileges = $this->group->get_privileges($group_id);
					
					if (!empty($data_privileges)) {
						foreach ($data_privileges as $row) {

							if (!in_array($row['modul_id'], $arr_modul_id)) {
								// delete data privileges
								$where_delete = [
									'group_id'	=> $group_id,
									'modul_id'	=> $row['modul_id']
								];
								$this->group->change_privileges('delete', $where_delete);

							} else {
								$arr_privileges_modul[] = $row['modul_id'];
							}
						}
					}

					foreach ($arr_modul_id as $value) {
						if (!in_array($value, $arr_privileges_modul) && $value!='') {
							// insert new data
							$data_insert = [
								'group_id'	=> $group_id,
								'modul_id'	=> $value
							];
							$this->group->change_privileges('insert', array(), $data_insert);
						}
					}

				} else {
					// delete all access
					$where_delete = [
						'group_id'	=> $group_id
					];
					$this->group->change_privileges('delete', $where_delete);
				}

				$arr = [
					'status'	=> 'success',
					'message'	=>	'Data berhasil disimpan'
				];
				echo json_encode($arr); exit;

				break;
			
			default:
				// get
				$group_id = $this->input->post('id');
				$arr_privileges_modul = [];
				$data_privileges = $this->group->get_privileges($group_id);
				if (!empty($data_privileges)) {
					foreach ($data_privileges as $row) {
						$arr_privileges_modul[] = $row['modul_id'];
					}
				}

				$data = $this->group->get_all_menu();
				if (!empty($data)) {
					$i = 0;
					foreach ($data as $row) {
						$arr['data'][$i] = [
							'id'	=> $row['code'],
							'parent' => $row['up']=='' ? '#' : $row['up'],
							'text'	=> $row['name'],
							'state'	=> [
								'opened'	=> true
							],
							'data'	=> [
								'modul_id'	=> $row['id']
							]
						];

						if (in_array($row['id'], $arr_privileges_modul)) {
							$arr['data'][$i]['state']['selected'] = true;
						}

						$i++;
					}
				}
				echo json_encode($arr);
				break;
		}
	}

}

/* End of file Group.php */
/* Location: ./application/controllers/Group.php */