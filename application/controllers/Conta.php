<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta extends CI_Controller {

	public function __construct() {
			parent::__construct();

			if ($this->session->userdata('logado')) {
				if(!$this->uri->segment(2) == "sair") {
						redirect('dashboard');
				}
			}
	}


	public function entrar() {
		$alerta = null;
		// Verifica se o formulário foi submetido
		if ($this->input->post('entrar') === "entrar") {
			// Verifica se o captcha for preenchido
			if ($this->input->post('captcha')) redirect('conta/entrar');
			// Validação do form
			$this->form_validation->set_rules('email', 'e-mail', 'required|valid_email');
			$this->form_validation->set_rules('senha', 'senha', 'required|min_length[3]|max_length[10]');
			if ($this->form_validation->run() === TRUE) {
				// Verifica se o usuário existe no banco e a senha está correta.
				$this->load->model('usuario_model');
				$email = $this->input->post('email');
				$senha = $this->input->post('senha');
				$login_existe = $this->usuario_model->check_login($email,$senha);
				if ($login_existe) {
					// Caso o login seja autorizado
					$usuario = $login_existe;
					// Inicia a sessão
					$session = array(
						'id'				=> $usuario["id"],
						'perfil'		=> $usuario["perfil"],
						'nome'			=> $usuario["nome"],
						'email'			=> $usuario["email"],
						'created' 	=> $usuario["created"],
						'logado' 		=> TRUE
					);
					$this->session->set_userdata($session);
					redirect('dashboard');
				} else {
					$alerta = array(
						"class" 		=> "danger",
						"mensagem" 	=> "Atenção, login inválido! Senha ou e-mail incorretos."
					);
				}
			} else {
				$alerta = array(
					"class" 		=> "danger",
					"mensagem" 	=> "Atenção, falha na validação do formulário</br>".validation_errors()
				);
			}
		}

		$dados = array(
			"alerta" 				=> $alerta,
			"view" 					=> 'conta/entrar',
			"hide_menu" 		=> TRUE
		);
		$this->load->view('template', $dados);
	}

	// Usuario como visitante
	public function visitante() {
		$alerta = null;
		// Verifica se o formulário foi submetido
		if ($this->input->post('visitante') === "visitante") {
			// Verifica se o captcha for preenchido
			if ($this->input->post('captcha')) redirect('conta/entrar');
			// Validação do form
					// Inicia a sessão
					$session = array(
						'id'				=> "",
						'perfil'		=> "comum",
						'nome'			=> "Visitante",
						'email'			=> "",
						'created' 	=> null,
						'logado' 		=> TRUE
					);
					$this->session->set_userdata($session);
					redirect('dashboard');

		}
		$dados = array(
			"alerta" 				=> $alerta,
			"view" 					=> 'conta/entrar',
			"hide_menu" 		=> TRUE
		);
		$this->load->view('template', $dados);
	}



	public function sair() {
		$this->session->sess_destroy();
		redirect('conta/entrar');
	}


}
