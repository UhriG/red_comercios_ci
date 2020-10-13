<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['form_validation']);
		$this->load->helper(['auth/login_rules']);
		$this->load->model('Auth');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function validate()
	{
		$this->form_validation->set_error_delimiters('', '');
		$rules = getLoginRules();
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() === false) {
			$errors = [
				'email' => form_error('email'),
				'password' => form_error('password'),
			];
			echo json_encode($errors);
			$this->output->set_status_header(400);
		} else {
			$email = $this->input->post('email');
			$pass = $this->input->post('password');
			if (!($res = $this->Auth->login($email, $pass))) {
				echo json_encode(['msg' => 'Verifique sus credenciales']);
				$this->output->set_status_header(401);
				exit();
			}
			$data = [
				'id' => $res->id,
				'nombre' => $res->nombre,
				'apellido' => $res->apellido,
				'email' => $res->email,
				'perfil' =>$res->perfil,				
				'is_logged' => true,
			];
			$this->session->set_userdata($data);

			echo json_encode(["url" => base_url('dashboard')]);
		}
	}
	public function logout()
	{
		$data = ['id', 'nombre', 'apellido', 'email', 'perfil', 'is_logged'];
		$this->session->unset_userdata($data);
		$this->session->sess_destroy();

		redirect('login');
	}
}
