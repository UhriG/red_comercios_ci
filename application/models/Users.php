<?php

class Users extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}

	public function create($user, $user_info)
	{
		$this->db->trans_start();
		$this->db->insert('usuarios', $user);
		$user_info['id_usuario'] = $this->db->insert_id();
		$this->db->insert('clientes', $user_info);
		$this->db->trans_complete();

		if ($this->db->trans_status() === false) {
			return false;
		} else {
			return true;
		}
	}
}