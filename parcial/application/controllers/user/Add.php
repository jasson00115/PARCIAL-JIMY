<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Add extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
	}

	public function index()
	{
		$this->load->view('user/add');
	}

	public function save()
	{
		$nombre = $this->input->post("nombre");
		$apellido = $this->input->post("apellido");
		$direccion = $this->input->post("direccion");
		$movil = $this->input->post("movil");
		$email = $this->input->post("email");
		$dpi = $this->input->post("dpi");
		$inactivo = $this->input->post("inactivo");

		$this->form_validation->set_rules('fullName', 'nombre', 'required|min_length[3]');
		$this->form_validation->set_rules('apellido', 'apellido', 'required|min_length[3]');
		$this->form_validation->set_rules('direccion', 'direccion', 'required|min_length[3]');
		$this->form_validation->set_rules('movil', 'movil', 'required|min_length[3]');
		$this->form_validation->set_rules('dpi', 'dpi', 'required|min_length[3]');
		$this->form_validation->set_rules('user', 'user', 'required|min_length[3]');
		$this->form_validation->set_rules('inactivo', 'inactivo', 'required|min_length[3]');

		//if ($this->form_validation->run() == FALSE){
		$this->load->view('user/add');
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

		$this->User_model->save($data);
		$this->session->set_flashdata('success', 'Se guardo los datos correctamente');
		redirect(base_url() . "usuarios");
		//}
	}
}
