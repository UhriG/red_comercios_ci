<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_client extends CI_Migration
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
			'nombre' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'apellido' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'dni' => [
				'type' => 'int',
				'constraint' => '15',
				'null' => true,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'telefono' => [
				'type' => 'int',
				'constraint' => '20',
				'null' => true,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'qr' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'puntos' => [
				'type' => 'int',
				'constraint' => '255',
				'null' => true,
			],
		]);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('clientes');
	}

	public function down()
	{
		$this->dbforge->drop_table('clientes');
	}
}