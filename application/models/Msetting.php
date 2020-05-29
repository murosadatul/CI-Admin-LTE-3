<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msetting extends CI_Model {

	function setting_all()
	{
		$arr = [];
		$q = $this->db->get('system_setting');
		$data = $q->result_array();
		if (!empty($data)) {
			foreach ($data as $row) {
				$arr[$row['code']] = $row['value'];
			}
		}
		return $arr;
	}

	function by_category($category)
	{
		$this->db->where('category', $category);
		$q = $this->db->get('sys_setting');
		$data = $q->result_array();
		return $data;
	}

}

/* End of file Model_setting.php */
/* Location: ./application/models/Model_setting.php */