<?php
if (!function_exists('getCreateUserRules')) {
	function getLoginRules()
	{
		return [
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|trim',
				'errors' => [
					'required' => 'El %s es requerido',
				],
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|trim',
				'errors' => [
					'required' => 'El %s es requerido',
				],
			],
		];
	}
}