<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		$this->load->helper(array('auth/login_rules'));
		$this->load->model('Auth');
	}

	public function index(){
		$this->load->view('login');		
	}

	public function validate(){
		$this->form_validation->set_error_delimiters('', '');
		$rules = getLoginRules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() === FALSE){
			$errors = array(
				'email' => form_error('email'),
				'password' => form_error('password'),
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		}else{
			$email =  $this->input->post('email');
			$pass =  $this->input->post('password');
			if(!$res = $this->Auth->login($email, $pass)){
				echo json_encode(array('msg' => 'Verifique sus credenciales'));
				$this->output->set_status_header(401);
				exit;
			};
			$data = array(
				'id' => $res->id,
				'nombre' => $res->nombre,
				'apellido' => $res->apellido,
				'estado' => $res->estado,
				'perfil' => $res->perfil,
				'is_logged' => TRUE,
			);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('msg','Bienvenido al sistema '.$data['nombre'].' '.$data['apellido']);
			echo json_encode(array("url" => base_url('dashboard')));
		}
	}
	public function logout(){
		$data = array('id','nombre','apellido','estado','perfil','is_logged');
		$this->session->unset_userdata($data);
		$this->session->sess_destroy();

		redirect('login');
	}
}
