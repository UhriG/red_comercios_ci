<?php

if (!function_exists('getUpdateUserRules')) {
	function getUpdateUserRules(){
		return [
			[
				'field' => 'nombre',
				'label' => 'nombre',
				'rules' => 'required',
				'errors' => [
					'required' => 'El campo %s no puede ir vacío',
				],
			],
			[
				'field' => 'apellido',
				'label' => 'apellido',
				'rules' => 'required',
				'errors' => [
					'required' => 'El campo %s no puede ir vacío',
				],
			],
			[
				'field' => 'telefono',
				'label' => 'teléfono',
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'El campo %s no puede ir vacío',
					'numeric' => 'Ingrese solo números',
				],
			],
			
		];
	}
}

if (!function_exists('getCreateUserRules')) {
	function getCreateUserRules()
	{
		return [
			[
				'field' => 'nombre',
				'label' => 'Nombre',
				'rules' => 'required',
				'errors' => [
					'required' => 'El campo %s no puede ir vacío',
				],
			],
			[
				'field' => 'apellido',
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
				'rules' => 'required|valid_email|is_unique[usuarios.email]',
				'errors' => [
					'required' => 'El campo %s no puede ir vacío',
					'valid_email' => 'Ingrese un %s válido',
					'is_unique' => 'El %s ingresado ya se encuentra registrado',
				],
			],
			[
				'field' => 'telefono',
				'label' => 'teléfono',
				'rules' => 'required|numeric',
				'errors' => [
					'required' => 'El campo %s no puede ir vacío',
					'numeric' => 'Ingrese solo números',
				],
			],
			
		];
	}
}
