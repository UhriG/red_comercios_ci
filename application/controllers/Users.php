<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(['users/users_rules']);
		$this->load->model('ModelsUsers');
	}

	public function index (){	
		$data = $this->ModelsUsers->getUsers();	
		$vista = $this->load->view('admin/show_users',array('data' => $data),TRUE);
		$this->getTemplate($vista);
	}

	public function create(){
		$vista = $this->load->view('admin/create_users', '', TRUE);
		$this->getTemplate($vista);
	}

	public function store(){
		$nombre = $this->input->post('firstname');
		$apellido = $this->input->post('lastname');
		$dni = $this->input->post('dni');
		$email = $this->input->post('email');
		$telefono = $this->input->post('tel');
		$password = $this->input->post('password');
		$perfil = $this->input->post('perfil');

		$this->form_validation->set_rules(getCreateUserRules());

		if($this->form_validation->run() == FALSE){
			
		}else{
			$this->session->set_flashdata('msg', 'El usuario ha sido registrado con éxito.');
			redirect(base_url('users'));
		}

		$vista = $this->load->view('admin/create_users', '', TRUE);
		$this->getTemplate($vista);
	}

	public function list (){
		$data = $this->ModelsUsers->getUsers();
		$vista = $this->load->view('admin/show_users',array('data' => $data),TRUE);
		$this->getTemplate($vista);
	}

	public function admin(){
		$vista = $this->load->view('admin/admin_users','',TRUE);
		$this->getTemplate($vista);
	}

	public function getTemplate($view){
		$data = array(
			'head' => $this->load->view('layout/head','',TRUE),
			'nav' => $this->load->view('layout/nav','',TRUE),
			'aside' => $this->load->view('layout/aside','',TRUE),
			'content' => $view,
			'footer' => $this->load->view('layout/footer','',TRUE),				
		);
					
		$this->load->view('dashboard',$data);
	}
}
