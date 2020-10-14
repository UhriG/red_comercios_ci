<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelsClients');	
		
	}	

	public function index()
	{
		$vista = $this->load->view('clients/user_dashboard', '', TRUE);
		$this->getTemplate($vista);		
	}
	
	///Perfil del cliente
	public function profile (){		
		$vista = $this->load->view('clients/user_info','',TRUE);
		$this->getTemplate($vista);
	}

	///Panel cliente: al leer el qr llega el dni del cliente y lleva a su perfil
	public function panel($dni=''){
		$data = $this->ModelsClients->getClient($dni);
		$vista = $this->load->view('clients/user_panel', array('data' => $data), TRUE);
		$this->getTemplate($vista);	
		return $dni;	
	}

	public function load_points(){
		///ID usuario del CLIENTE
		$idUsuario = $this->input->post('idUsuario');
		$idCliente = $this->input->post('idCliente');

		$idComercio = $this->input->post('idComercio');

		$puntos = array('puntos' => $this->input->post('puntos'));
		
		$cliente = $this->ModelsClients->getUser($idCliente);
		$comercio = $this->ModelsClients->getUser($idComercio);
		
		///Guardo la informacion de quien le cargo puntos a quien y a que hora
		$this->ModelsClients->movimientos($puntos,$cliente,$comercio);

		///Cargo los puntos
		$this->ModelsClients->updatePoints($idUsuario,$puntos);				
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

/* End of file Clients.php */