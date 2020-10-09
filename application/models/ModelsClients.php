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

	///Funcion para cargar puntos al cliente, recibe el id y los puntos por parametro
	public function updatePoints($id, $data){
		///En la variable $campo utilizo la funcion getPuntosId para traer la info actual del cliente
		$campo = $this->getPuntosId($id);
		///En la siguiente consulta, agarro los puntos actuales del cliente y los sumo con los recibidos por parametro
		$this->db->set('puntos',  $campo->puntos+$data['puntos'], TRUE);
		///Busco el cliente correspondiente al ID recibido
		$this->db->where('id', intval($id));
		///Actualizo la tabla con el puntaje nuevo
		$this->db->update('clientes');
		redirect(base_url('clients/panel/'.$campo->dni));	

	}
	
	public function getPuntosId($id){ 
		$fila = $this->db->get_where('clientes', array('id'=>$id))->row();  return $fila;
	}

}

/* End of file ModelsClients.php */