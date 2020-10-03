<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct(){
		parent::__construct();
        $this->load->helper(array('getMenu'));
		$this->load->model('Users');
		
		$this->load->library('form_validation');
	}

	public function index(){
        $data['menu'] = main_menu();
        $this->load->view('register', $data);
        $query = $this->db->get('usuarios');
    }
    
    public function create(){
        $nombre = $this->input->post('firstname');
        $apellido = $this->input->post('lastname');
        $dni = $this->input->post('dni');
        $email = $this->input->post('email');
		$telefono = $this->input->post('tel');
		$password = $this->input->post('password');
		$password_c = $this->input->post('password_c');

		$config = array(
			array(
					'field' => 'firstname',
					'label' => 'Nombre',
					'rules' => 'required|alpha',
					'errors' => array(
						'required' => 'El campo %s no puede ir vacío',
						'alpha' => 'Ingrese un %s válido, solo se admiten letras',
					),
				),
			array(
					'field' => 'lastname',
					'label' => 'Apellido',
					'rules' => 'required|alpha',
					'errors' => array(
						'required' => 'El campo %s no puede ir vacío',
						'alpha' => 'Ingrese un %s válido, solo se admiten letras',					
					),
				),
			array(
				'field' => 'dni',
				'label' => 'DNI',
				'rules' => 'required|numeric|is_unique[usuarios.dni]|exact_length[8]',	
				'errors' => array(
					'required' => 'El campo %s no puede ir vacío',
					'numeric' => 'Ingrese solo números',
					'is_unique' => 'El %s ingresado ya se encuentra registrado',
					'exact_length' => 'Ingrese los 8 dígitos del %s'
				),
			),
			array(
				'field' => 'email',
				'label' => 'email',
				'rules' => 'required|valid_email|is_unique[usuarios.email]',
				'errors' => array(
					'required' => 'El campo %s no puede ir vacío',
					'valid_email' => 'Ingrese un %s válido',
					'is_unique' => 'El %s ingresado ya se encuentra registrado',				
				),
			),
			array(
				'field' => 'tel',
				'label' => 'teléfono',
				'rules' => 'required|numeric',
				'errors' => array(
					'required' => 'El campo %s no puede ir vacío',
					'numeric' => 'Ingrese solo números',
				),
			),
			array(
				'field' => 'password',
				'label' => 'contraseña',
				'rules' => 'required',
				'errors' => array(
					'required' => 'El campo % no puede ir vacío',
				),
			),
			array(
				'field' => 'password_c',
				'label' => 'confirmación de contraseña',
				'rules' => 'required|matches[password]',
				'errors' => array(
					'matches' => 'La %s no es igual a la contraseña',
				),
			),
		);
		
		
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE){
			$data['menu'] = main_menu();
			$this->load->view('register',$data);
		}
		else{
			$datos = array(
				'nombre' => $nombre,
				'apellido' => $apellido,
				'dni' => $dni,
				'email' => $email,
				'telefono' => $telefono,
				'password' => $password
			);
	
			$data['menu'] = main_menu();
	
			if(!$this->Users->create($datos)){
				$data['msg'] = 'Ocurrio un error al ingresar los datos, intente nuevamente';
				$this->load->view('register', $data);
			}
			$data['msg'] = 'Registrado correctamente';
			$this->load->view('register', $data);
		}		
    }
}
