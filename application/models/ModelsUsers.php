<?php
class ModelsUsers extends CI_Model{
	function __construct(){
		$this->load->database();
	}
	public function getUsers(){
		$sql = $this->db->get('clientes');
		return $sql->result();
	}

}
