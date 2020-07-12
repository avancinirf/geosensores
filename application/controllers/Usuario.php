<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct() {
			parent::__construct();
			// Verifica se o usuário está logado
			if (!$this->session->userdata('logado')) {
				redirect('conta/entrar');
			}
	}


	// Visualizar todos os usuários do sistema
	public function visualizar_todos() {
		if ($this->session->userdata('perfil') !== "admin") redirect('home');

		$alerta = null;
		$this->load->model('usuario_model');
		$usuarios = $this->usuario_model->get_usuarios();

		$dados = array(
			"alerta" 		=> $alerta,
			"usuarios" 	=> $usuarios,
			"view" 			=> 'usuario/visualizar_todos'
		);
		$this->load->view('template', $dados);
	}


	// Cadastrar um novo usuário
	public function cadastrar() {
		if ($this->session->userdata('perfil') !== "admin") redirect('home');
		$alerta = null;
		if ($this->input->post('cadastrar') && $this->input->post('cadastrar') === "cadastrar") {
			if ($this->input->post('captcha')) redirect('conta/entrar');
			// Regras de validação
			$this->form_validation->set_rules('email', 'e-mail', 'required|valid_email|is_unique[usuario.email]');
			$this->form_validation->set_rules('nome', 'nome', 'required|min_length[3]|max_length[100]');
			$this->form_validation->set_rules('senha', 'senha', 'required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('confirmar_senha', 'confirmar senha', 'required|min_length[3]|max_length[20]|matches[senha]');

			// Verifica se as regras são atendidas
			if ($this->form_validation->run() === TRUE) {
				$novo_usuario = array(
					"nome" 		=> $this->input->post('nome'),
					"email" 	=> $this->input->post('email'),
					"senha" 	=> $this->input->post('senha')
				);
				$this->load->model('usuario_model');
				$cadastrou = $this->usuario_model->insert_usuario($novo_usuario);
				if ($cadastrou) {
					$alerta = array(
						"class" => "success",
						"mensagem" => "Usuário cadastrado com sucesso."
					);
				} else {
					$alerta = array(
						"class" => "danger",
						"mensagem" => "Atenção! O usuário não foi cadastrado."
					);
				}

			} else {
				$alerta = array(
					"class" => "danger",
					"mensagem" => "Atenção! Erro ao preencher o formulário.</br>".validation_errors()
				);
			}
		}

		$dados = array(
			"alerta" => $alerta,
			"view" 			=> 'usuario/cadastrar'
		);
		$this->load->view('template', $dados);
	}


	// Editar um usuário
	public function editar($id_usuario) {
		$alerta = null;
		$usuario = null;
		$id_usuario = (int) $id_usuario;

		// Verifica se o usuário tem perfil de edição
		//if ($this->session->userdata('perfil') !== "admin") redirect('conta/entrar');
		if ($id_usuario) {
			$this->load->model('usuario_model');
			$usuario = $this->usuario_model->get_usuario($id_usuario);
			// Verifica se usuário existe no banco de dados
			if ($usuario) {
				if ($this->input->post('editar') === "editar") {
					if ($this->input->post('captcha')) redirect('conta/entrar');
					$id_usuario_form = (int) $this->input->post('id_usuario');
					if ($id_usuario !== $id_usuario_form) redirect('conta/entrar');

					// Regras de validação
					$this->form_validation->set_rules('email', 'e-mail', 'required|valid_email');
					$this->form_validation->set_rules('nome', 'nome', 'required|min_length[3]|max_length[100]');
					$this->form_validation->set_rules('senha', 'senha', 'min_length[3]|max_length[20]');
					$this->form_validation->set_rules('confirmar_senha', 'confirmar senha', 'matches[senha]|min_length[3]|max_length[20]|matches[senha]');

					// Verifica se as regras são atendidas
					if ($this->form_validation->run() === TRUE) {
						$usuario_atualizado = array(
							"nome" 		=> $this->input->post('nome'),
							"email" 	=> $this->input->post('email')
						);
						if ($this->input->post('senha')) {
							$usuario_atualizado["senha"] = $this->input->post('senha');
						}
						if ($this->usuario_model->update_usuario($id_usuario, $usuario_atualizado)) {
							$alerta = array(
								"class" => "success",
								"mensagem" => "Usuário atualizado com sucesso."
							);
						} else {
							$alerta = array(
								"class" => "danger",
								"mensagem" => "Atenção! O usuário não foi atualizado."
							);
						}
					} else {
						$alerta = array(
							"class" => "danger",
							"mensagem" => "Atenção! Erro ao preencher formulário.</br>".validation_errors()
						);
					}
				}
			} else {
				$usuario = FALSE;
				$alerta = array(
					"class" => "danger",
					"mensagem" => "Atenção! O usuário não encontrado.</br>"
				);
			}
		} else {
			$alerta = array(
				"class" => "danger",
				"mensagem" => "Atenção! O usuário informado está incorreto.</br>"
			);
		}
		$dados = array(
			"alerta" => $alerta,
			"usuario" => $usuario,
			"view" 			=> 'usuario/editar'
		);
		$this->load->view('template', $dados);
	}


	public function deletar($id_usuario) {
		$alerta = null;
		$usuario = null;
		$id_usuario = (int) $id_usuario;

		if ($id_usuario) {
			$this->load->model('usuario_model');
			$existe = $this->usuario_model->get_usuario($id_usuario);
			// Verifica se usuário existe no banco de dados
			if ($existe) {
				$deletou = $this->usuario_model->delete_usuario($id_usuario);
				if ($deletou) {
					$alerta = array(
						"class" => "success",
						"mensagem" => "Usuário removido com sucesso."
					);
				} else {
					$alerta = array(
						"class" => "danger",
						"mensagem" => "Atenção! O usuário não foi removido."
					);
				}
			} else {
				$alerta = array(
					"class" => "danger",
					"mensagem" => "Atenção! O usuário não encontrado."
				);
			}
		} else {
			$alerta = array(
				"class" => "danger",
				"mensagem" => "Atenção! O usuário informado está incorreto."
			);
		}
		$dados = array(
			"alerta" 	=> $alerta,
			"view" 			=> 'usuario/deletar'
		);
		$this->load->view('template', $dados);
	}

}
