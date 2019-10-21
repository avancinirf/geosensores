<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quemsomos extends CI_Controller {

	public function index()
	{
		$data = array(
			"alert" => null,
			"view" 	 => 'quemsomos/index'
		);
		$this->load->view('template', $data);
	}
}
