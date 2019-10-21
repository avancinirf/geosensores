<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function check_login($email, $senha) {
		$this->db->from('usuario');
		$this->db->where('email', $email);
		$this->db->where('senha', $senha);
		$query = $this->db->get();
		if ($query->num_rows()) {
			return $query->row_array();;
		} else {
			return FALSE;
		}
	}

	// Busca o usuário pelo ID no banco de dados
	public function get_usuario($id_usuario) {
		$this->db->where('id', $id_usuario);
		$query = $this->db->get('usuario');
		if ($query->num_rows()) {
			return $query->row_array();
		} else {
			return FALSE;
		}
	}

	// Busca todos os usuários do banco de dados
	public function get_usuarios() {
		$query = $this->db->get('usuario');
		if ($query->num_rows()) {
			return $query->result_array();
		} else {
			return FALSE;
		}
	}


	// Atualiza usuário
	public function update_usuario($id_usuario, $usuario_atualizado) {
		$this->db->where('id', $id_usuario);
		$this->db->update('usuario', $usuario_atualizado);
		if ($this->db->affected_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// Remove usuário
	public function delete_usuario($id_usuario) {
		$this->db->where('id', $id_usuario);
		$query = $this->db->delete('usuario');
		if ($this->db->affected_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// Inserir usuário
	public function insert_usuario($novo_usuario) {
		$query = $this->db->insert('usuario', $novo_usuario);
		if ($this->db->affected_rows()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}






}
