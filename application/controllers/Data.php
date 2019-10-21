<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {

	public function index()
	{
		$data = array(
			"alert" => null,
			"view"  => 'data/index'
		);
		$this->load->view('template', $data);
	}
}
