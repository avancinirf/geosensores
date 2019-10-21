<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
			parent::__construct();
			// Verifica se o usuário está logado
			if (!$this->session->userdata('logado')) {
						redirect('conta/entrar');
			}
	}


	// Exibir informações sobre o sistema
	public function index() {
		$alerta = null;

		$dados = array(
			"alerta" => $alerta,
			"view" 		=> 'dashboard/index'
		);
		$this->load->view('template', $dados);
	}



}
