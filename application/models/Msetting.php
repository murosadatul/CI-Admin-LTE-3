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

}

/* End of file Msetting.php */
/* Location: ./application/models/Msetting.php */