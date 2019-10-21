<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analysis extends CI_Controller {

	public function index()
	{
		$data = array(
			"alert" => null,
			"view"  => 'analysis/index'
		);
		$this->load->view('template', $data);
	}
}
