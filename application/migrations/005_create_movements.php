<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_movements extends CI_Migration
{
	public function up()
	{
		$this->dbforge->add_field([
			'id' => [
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'id_comercio' =>[
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => true,	
			],
			'nombre_comercio' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'id_cliente' =>[
				'type' => 'INT',
				'constraint' => 10,
				'unsigned' => true,	
			],
			'nombre_cliente' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'puntos_cargados' => [
				'type' => 'int',
				'constraint' => '255',
				'null' => true,
			],
			'Hora
			DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP'
		]);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('movimientos');
	}

	public function down()
	{
		$this->dbforge->drop_table('movimientos');
	}
}
