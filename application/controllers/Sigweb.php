<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sigweb extends CI_Controller {

	public function __construct() {
			parent::__construct();
			// Verifica se o usuário está logado
			if (!$this->session->userdata('logado')) {
						redirect('conta/entrar');
			}
	}


	// Visualizar todos os usuários do sistema
	public function mapa_simples() {
		$alerta = null;
		$dados = array(
			"alerta" 		=> $alerta,
			"view" 			=> 'sigweb/mapa_simples'
		);
		$this->load->view('template', $dados);
	}




}
