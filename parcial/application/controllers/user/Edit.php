<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
	}

	public function index($alumno)
	{
		$data = $this->User_model->getUser($alumno);
		$this->load->view('user/edit', $data);
	}

	public function update($alumno)
	{
		$nombre = $this->input->post("nombre");
		$apellido = $this->input->post("apellido");
		$direccion = $this->input->post("direccion");
		$movil = $this->input->post("movil");
		$email = $this->input->post("email");
		$dpi = $this->input->post("dpi");
		$inactivo = $this->input->post("inactivo");

		$data = $this->User_model->getUser($alumno);

		$validateEMail = "";

		if ($email != $data->email) {
			$validateEMail = "|is_unique[user.email]";
		}

		$this->form_validation->set_rules('fullName', 'nombre', 'required|min_length[3]');
		$this->form_validation->set_rules('apellido', 'apellido', 'required|min_length[3]');
		$this->form_validation->set_rules('direccion', 'direccion', 'required|min_length[3]');
		$this->form_validation->set_rules('movil', 'movil', 'required|min_length[3]');
		$this->form_validation->set_rules('dpi', 'dpi', 'required|min_length[3]');
		$this->form_validation->set_rules('user', 'user', 'required|min_length[3]');
		$this->form_validation->set_rules('inactivo', 'inactivo', 'required|min_length[3]');

		//if ($this->form_validation->run() == FALSE){
		$this->index($alumno);
		//}else{
		$data = array(
			"nombre" => $nombre,
			"apellido" => $apellido,
			"direccion" => $direccion,
			"movil" => $movil,
			"email" => $email,
			"dpi" => $dpi,
			"user" => 1,
			"inactivo" => $inactivo,
		);

		$this->User_model->update($data, $alumno);
		$this->session->set_flashdata('success', 'Los datos actualizaron correctamente');
		redirect(base_url() . "usuarios");
		//}
	}
}
