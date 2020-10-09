<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users');
		$this->load->library(['form_validation', 'email', 'ciqrcode']);
	}

	public function index()
	{
		$this->load->view('register');
		$query = $this->db->get('clientes');
	}

	public function create()
	{
		$nombre = $this->input->post('firstname');
		$apellido = $this->input->post('lastname');
		$dni = $this->input->post('dni');
		$email = $this->input->post('email');
		$telefono = $this->input->post('tel');
		$password = $this->input->post('password');
		$password_c = $this->input->post('password_c');

		$config = [
			[
				'field' => 'firstname',
				'label' => 'Nombre',
				'rules' => 'required',
				'errors' => [
					'required' => 'El campo %s no puede ir vacío',
				],
			],
			[
				'field' => 'lastname',
				'label' => 'Apellido',
				'rules' => 'required',
				'errors' => [
					'required' => 'El campo %s no puede ir vacío',
				],
			],
			[
				'field' => 'dni',
				'label' => 'DNI',
				'rules' =>
					'required|numeric|is_unique[clientes.dni]|exact_length[8]',
				'errors' => [
					'required' => 'El campo %s no puede ir vacío',
					'numeric' => 'Ingrese solo números',
					'is_unique' => 'El %s ingresado ya se encuentra registrado',
					'exact_length' => 'Ingrese los 8 dígitos del %s',
				],
			],
			[
				'field' => 'email',
				'label' => 'email',
				'rules' => 'required|valid_email|is_unique[clientes.email]',
				'errors' => [
					'required' => 'El campo %s no puede ir vacío',
					'valid_email' => 'Ingrese un %s válido',
					'is_unique' => 'El %s ingresado ya se encuentra registrado',
				],
			],
			[
				'field' => 'tel',
				'label' => 'teléfono',
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'El campo %s no puede ir vacío',
					'numeric' => 'Ingrese solo números',
				],
			],
			[
				'field' => 'password',
				'label' => 'contraseña',
				'rules' => 'required',
				'errors' => [
					'required' => 'El campo % no puede ir vacío',
				],
			],
			[
				'field' => 'password_c',
				'label' => 'confirmación de contraseña',
				'rules' => 'required|matches[password]',
				'errors' => [
					'matches' => 'La %s no es igual a la contraseña',
				],
			],
		];

		///Encriptamos la contrsaeña
		$password_segura = password_hash($password, PASSWORD_BCRYPT, [
			'cost' => 4,
		]);

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == false) {
			$this->load->view('register');
		} else {
			$datos = [
				'nombre' => $nombre,
				'apellido' => $apellido,
				'dni' => $dni,
				'email' => $email,
				'telefono' => $telefono,
				'password' => $password_segura,
				'pass' => $password,
			];

			///Genero el código QR y retorno la ruta de la imagen
			$qr = $this->generateQR($datos['dni']);
			$qr = str_replace('\\', '/', $qr);

			///Agrego al array de datos el codigo qr para ser guardado en la base de datos
			$datos = array_merge($datos, ['qr' => $qr]);

			if (!$this->Users->create($datos)) {
				$data['msg'] =
					'Ocurrio un error al ingresar los datos, intente nuevamente';
				$this->load->view('register', $data);
			}

			///Envio el email con los datos de login y la imagen qr
			$this->sendEmail($datos);
			$data['msg'] = 'Registrado correctamente';
			$this->load->view('register', $data);
		}
	}

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

	public function sendEmail($datos)
	{
		$this->email->from('registro@reddecomercios.com', 'Red de comercios');
		$this->email->to($datos['email']);

		$this->email->subject('Datos de cuenta');
		$vista = $this->load->view('emails/welcome', $datos, true);
		$this->email->message($vista);

		$this->email->send(); 
	}
}