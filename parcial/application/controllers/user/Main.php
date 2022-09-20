<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("User_model");
	}

	public function index()
	{
		$data = array("data" => $this->User_model->getUsers());

		$this->load->view('user/main', $data);
	}

	public function delete($alumno)
	{
		$this->User_model->delete($alumno);
		$this->session->set_flashdata('success', 'El usuario se eliminó correctamente');
		redirect(base_url() . "usuarios");
	}

	public function sesion()
	{
		$email = $this->input->post('email');
		$contrasenia = $this->input->post('contrasenia');

		$datos = $this->User_model->accederA($email, $contrasenia);

		if ($datos) {
			$this->load->view('user/next');
		} else {	
			$this->load->view('user/login', $datos);
		}
	}

	public function actua(){
		$email = $this->input->post('email');
		$contrasenia = $this->input->post('contrasenia');
		
		$contraseniaV = $this->User_model->cambioC($email, $contrasenia);
		
		if ($contraseniaV) {
			$this->load->view('user/login');
		} else {
			$this->load->view('user/pwupdate', $contraseniaV);
		}
	}

	public function siguiente()
	{
		$this->load->view('user/next');
	}

	public function pwupdate(){
		$this->load->view('user/pwupdate');
	}

	public function vistaprin(){
		$this->load->view('user/login');
	}

	public function vistac(){
		$this->load->view('user/pwupdate');
	}
}
