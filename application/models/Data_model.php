<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

	public function insert_data($new_data) {
		$query = $this->db->insert('sensor_a', $new_data);
		if ($this->db->affected_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}






}
