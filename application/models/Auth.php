<?php

class Auth extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}

	public function login($email, $password)
	{
		//Hago una consulta en la BD segun el mail ingresado en el login
		$query = $this->db->get_where('clientes', ['email' => $email], 1);

		//Verifico que la consulta devuelva algo, si no habria error en caso de un email inexistente
		if (!$query->result()) {
			return false;
		}

		//Traigo los datos de esa fila
		$row = $query->row();

		//Verifico si la contraseña ingresada coincide con el hash guardado en la BD
		$verify = password_verify($password, $row->password);

		//Si la contraseña coincide retorno la fila
		if ($verify) {
			return $query->row();
		}
	}
}