<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('ModelsUsers');
	}

	public function index (){		
		$vista = $this->load->view('home','',TRUE);
		$this->getTemplate($vista);
	}

	public function info (){		
		$vista = $this->load->view('users/user_info','',TRUE);
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

