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

	public function add() {
		$alert = null;

		if ($this->input->post('add') && $this->input->post('add') === "add") {
			if ($this->input->post('captcha')) redirect('data/add');
			$path = "./uploads/";
			if ( ! is_dir($path)) {
				mkdir($path, 0777, $recursive = true);
			}
			$configUpload['upload_path'] = $path;
			$configUpload['allowed_types'] = 'geojson';

			$this->upload->initialize($configUpload);

			if (!empty($_FILES['file_name']['name'])) {
				$configUpload['file_name'] = preg_replace("[^a-zA-Z0-9_]", "", strtr($_FILES['file_name']['name'], "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
			}

			if ($this->upload->do_upload('file_name')) {
				$data['fileData'] = $this->upload->data();
				$filePath = 'uploads/'.$data['fileData']['file_name'];
				$data['urlFile'] = base_url($filePath);
				//$xlsxFile = simplexml_load_file($data['urlFile']);
				var_dump('teste');
			} else {
				$alert = array(
					"class" => "danger",
					"mensagem" => "Erro ao fazer upload do arquivo. </br>".$this->upload->display_errors()
				);
			}
		}

		$data = array(
			"alert" => $alert,
			"view"   => 'data/add'
		);
		$this->load->view('template', $data);
	}


}
