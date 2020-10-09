<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_user extends CI_Migration
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
			'usuario' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'password' => [
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
		$this->dbforge->create_table('usuarios');

		///Datos del usuario administrador por defecto
		$data = [
			'usuario' => 'admin',
			'email' => 'admin@admin.com',
			'password' => password_hash('admin', PASSWORD_BCRYPT, [
				'cost' => 4,
			]),
			'perfil' => '2', /// 0=cliente, 1=comercio, 2=administrador
			'estado' => '1', /// 1 activo, 0 inactivo
		];
		///Subo el usuario administrador a la tabla usuarios
		$this->db->insert('usuarios', $data);
	}

	public function down()
	{
		$this->dbforge->drop_table('usuarios');
	}
}