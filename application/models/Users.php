<?php

class Users extends CI_Model{
	function __construct(){
		$this->load->database();
	}

	public function create($datos){

		$datos = array(
			'nombre' => $datos['nombre'],
			'apellido' => $datos['apellido'],
			'dni' => $datos['dni'],
			'email' => $datos['email'],
			'telefono' => $datos['telefono'],
			'password' => $datos['password'],
			'qr' => $datos['qr'],
			'puntos' => 0,
			'perfil' => 0,
			'estado' => 0,
		);

		if(!$this->db->insert('usuarios', $datos)){
			return false;
		}
		return true;
	}
	
}