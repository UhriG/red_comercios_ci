<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
		parent::__construct();
        $this->load->helper(array('getMenu'));
        $this->load->database();
	}

	public function index(){
        $data['menu'] = main_menu();
        $this->load->view('register', $data);
        $query = $this->db->get('usuarios');
        var_dump($query->result());
    }
    
    public function create(){
        $nombre = $this->input->post('firstname');
        $apellido = $this->input->post('lastname');
        $dni = $this->input->post('dni');
        $email = $this->input->post('email');
        $telefono = $this->input->post('telefono');
    }
}
