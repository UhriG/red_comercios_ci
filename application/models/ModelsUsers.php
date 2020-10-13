<?php
class ModelsUsers extends CI_Model
{
	function __construct()
	{
		$this->load->database();
	}

	public function guardarCliente($user, $user_info)
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

	public function guardarComercio($user, $user_info)
	{
		$this->db->trans_start();
		$this->db->insert('usuarios', $user);
		$user_info['id_usuario'] = $this->db->insert_id();
		$this->db->insert('comercios', $user_info);
		$this->db->trans_complete();

		if ($this->db->trans_status() === false) {
			return false;
		} else {
			return true;
		}
	}

	public function guardarAdmin($user, $user_info)
	{
		$this->db->trans_start();
		$this->db->insert('usuarios', $user);
		$user_info['id_usuario'] = $this->db->insert_id();
		$this->db->insert('admins', $user_info);
		$this->db->trans_complete();

		if ($this->db->trans_status() === false) {
			return false;
		} else {
			return true;
		}
	}

	public function getClientes()
	{		
		$sql = $this->db->get('clientes');
		return $sql->result();
	}

	public function getComercios()
	{		
		$sql = $this->db->get('comercios');
		return $sql->result();
	}

	public function getAdmins()
	{		
		$sql = $this->db->get('admins');
		return $sql->result();
	}
}