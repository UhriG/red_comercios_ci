<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModelsClients extends CI_Model {
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getClient($dni){
		$query = $this->db->get_where('clientes',array('dni'=>$dni),1);
		if(!$query->result()){
			return false;
		}

		return $query->row();
	}	

}

/* End of file ModelsClients.php */
