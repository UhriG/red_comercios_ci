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
		$sql = $this->db->get_where('usuarios',array('perfil'=>'cliente'));
		return $sql->result();
	}

	public function getComercios()
	{		
		$sql = $this->db->get_where('usuarios',array('perfil'=>'comercio'));
		return $sql->result();
	}

	public function getAdmins()
	{		
		$sql = $this->db->get_where('usuarios',array('perfil'=>'admin'));
		return $sql->result();
	}

	public function getUserClient($id){
		$this->db->join('clientes', 'usuarios.id = clientes.id_usuario');
		$user = $this->db->get_where('usuarios',array('usuarios.id' => $id),1);
		return $user->row_array();
	}

	public function getUserCommerce($id){
		$this->db->join('comercios', 'usuarios.id = comercios.id_usuario');
		$user = $this->db->get_where('usuarios',array('usuarios.id' => $id),1);
		return $user->row_array();
	}

	public function getUserAdmin($id){
		$this->db->join('admins', 'usuarios.id = admins.id_usuario');
		$user = $this->db->get_where('usuarios',array('usuarios.id' => $id),1);
		return $user->row_array();
	}
}
