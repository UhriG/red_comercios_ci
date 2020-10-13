<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['form_validation', 'email', 'ciqrcode']);
		$this->load->helper(['users/users_rules', 'string']);
		$this->load->model('ModelsUsers');
	}

	public function index(){
		$vista = $this->load->view('admin/dashboard', '', true);
		$this->getTemplate($vista);
	}

	public function list_clients()
	{
		$data = $this->ModelsUsers->getClientes();
		$vista = $this->load->view('admin/show_clients', ['data' => $data], true);
		$this->getTemplate($vista);
	}

	public function list_commerce()
	{
		$data = $this->ModelsUsers->getComercios();
		$vista = $this->load->view('admin/show_commerce', ['data' => $data], true);
		$this->getTemplate($vista);
	}

	public function list_admins()
	{
		$data = $this->ModelsUsers->getAdmins();
		$vista = $this->load->view('admin/show_admins', ['data' => $data], true);
		$this->getTemplate($vista);
	}

	public function create()
	{
		$vista = $this->load->view('admin/create_users', '', true);
		$this->getTemplate($vista);
	}

	public function store()
	{
		$nombre = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$dni = $this->input->post('dni');
		$email = $this->input->post('email');
		$telefono = $this->input->post('telefono');
		$perfil = $this->input->post('perfil');

		$this->form_validation->set_rules(getCreateUserRules());

		///Generamos una contraseña random para enviarle al usuario creado
		$password = random_string('alnum', 8);
		///Encriptamos la contrsaeña
		$password_segura = password_hash($password, PASSWORD_BCRYPT, [
			'cost' => 4,
		]);

		if ($this->form_validation->run() == false) {
			$this->output->set_status(400);
		} else {
			$user = [
				'nombre' => $nombre,
				'apellido' => $apellido,
				'email' => $email,				
				'password' => $password_segura, ///Enviamos la contraseña encripatada a la BD
				'perfil' => $perfil,
				'estado' => 1,
			];

			$cliente = [
				'nombre' => $nombre,
				'apellido' => $apellido,
				'dni' => $dni,
				'telefono' => $telefono,
				'puntos' => 0,
			];
			$user_info = [
				'nombre' => $nombre,
				'apellido' => $apellido,
				'dni' => $dni,
				'telefono' => $telefono
			];
			///Genero el código QR y retorno la ruta de la imagen
			$qr = $this->generateQR($cliente['dni']);
			$qr = str_replace('\\', '/', $qr);			

			///Agrego al array de user_info el codigo qr para ser guardado en la base de datos
			$cliente = array_merge($cliente, ['qr' => $qr]);

			$datos = [
				'nombre' => $nombre,
				'apellido' => $apellido,
				'pass' => $password,
				'email' => $email,
				'qr' => $qr,
			];

			if ($user['perfil'] == 'cliente') {
				
				if (!$this->ModelsUsers->guardarCliente($user, $cliente)) {
					$this->output->set_status(400);
				} else {
					///Envio el email con los datos de login y la imagen qr
					$this->sendEmailCliente($datos);
					$this->session->set_flashdata(
						'msg',
						'El usuario ha sido registrado con éxito.'
					);
					redirect(base_url('users'));
				}
			} elseif ($user['perfil'] == 'comercio') {
				if (!$this->ModelsUsers->guardarComercio($user, $user_info)) {
					$this->output->set_status(400);
				} else {
					///Envio el email con los datos de login y la imagen qr
					$this->sendEmail($datos);
					$this->session->set_flashdata(
						'msg',
						'El usuario ha sido registrado con éxito.'
					);
					redirect(base_url('users'));
				}
			} elseif ($user['perfil'] == 'admin') {
				if (!$this->ModelsUsers->guardarAdmin($user, $user_info)) {
					$this->output->set_status(400);
				} else {
					///Envio el email con los datos de login y la imagen qr
					$this->sendEmail($datos);
					$this->session->set_flashdata(
						'msg',
						'El usuario ha sido registrado con éxito.'
					);
					redirect(base_url('users'));
				}
			}
		}

		$vista = $this->load->view('admin/create_users', '', true);
		$this->getTemplate($vista);
	}	

	public function update(){
		
	}

	public function editClient($id = 0){
		$user = $this->ModelsUsers->getUserClient($id);
		$vista = $this->load->view('admin/edit_users', array('user' => $user), TRUE);
		$this->getTemplate($vista);
	}

	public function editCommerce($id = 0){
		$user = $this->ModelsUsers->getUserCommerce($id);
		
		$vista = $this->load->view('admin/edit_users', '', TRUE);
		$this->getTemplate($vista);
	}

	public function editAdmin($id = 0){
		$user = $this->ModelsUsers->getUserAdmin($id);
		
		$vista = $this->load->view('admin/edit_users', '', TRUE);
		$this->getTemplate($vista);
	}

	///Funcion para generar QR y retornar la url de la imagen
	public function generateQR($dni)
	{
		$params['data'] = base_url() . 'clients/panel/' . $dni;
		$params['level'] = 'H';
		$params['size'] = 5;
		$params['savename'] = FCPATH . "assets/dist/img/qr/qr_dni_$dni.png";
		$url = base_url('assets/dist/img/qr/qr_dni_' . $dni . '.png');

		$this->ciqrcode->generate($params);

		$data['img'] = 'qr_dni_' . $dni . '.png';

		return $url;
	}

	///Funcion para enviarle al usuario creado la información por email
	public function sendEmailCliente($datos)
	{
		$this->email->from('registro@reddecomercios.com', 'Red de comercios');
		$this->email->to($datos['email']);

		$this->email->subject('Datos de cuenta');
		$vista = $this->load->view('emails/welcome_cliente', $datos, true);
		$this->email->message($vista);

		$this->email->send();
	}

	///Funcion para enviarle al usuario creado la información por email
	public function sendEmail($datos)
	{
		$this->email->from('registro@reddecomercios.com', 'Red de comercios');
		$this->email->to($datos['email']);

		$this->email->subject('Datos de cuenta');
		$vista = $this->load->view('emails/welcome', $datos, true);
		$this->email->message($vista);

		$this->email->send();
	}

	public function getTemplate($view)
	{
		$data = [
			'head' => $this->load->view('layout/head', '', true),
			'nav' => $this->load->view('layout/nav', '', true),
			'aside' => $this->load->view('layout/aside', '', true),
			'content' => $view,
			'footer' => $this->load->view('layout/footer', '', true),
		];

		$this->load->view('dashboard', $data);
	}
}
