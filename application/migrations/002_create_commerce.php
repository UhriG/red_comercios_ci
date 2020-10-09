<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_commerce extends CI_Migration
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
			'comercio' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
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
			'perfil' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => true,
			],
			'estado' => [
				'type' => 'tinyint',
				'constraint' => '1',
				'null' => true,
			],
		]);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('comercios');
	}

	public function down()
	{
		$this->dbforge->drop_table('comercios');
	}
}