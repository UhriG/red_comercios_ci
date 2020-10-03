<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_user extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nombre' => array(
                                'type' => 'VARCHAR',
								'constraint' => '100',
								'null' => TRUE,
                        ),
                        'apellido' => array(
								'type' => 'VARCHAR',
								'constraint' => '100',
								'null' => TRUE,
						),
						'dni' => array(
							'type' => 'int',
							'constraint' => '15',
							'null' => TRUE,
						),
						'email' => array(
							'type' => 'VARCHAR',
							'constraint' => '100',
							'null' => TRUE,
						),
						'telefono' => array(
							'type' => 'int',
							'constraint' => '20',
							'null' => TRUE,
						),
						'password' => array(
							'type' => 'VARCHAR',
							'constraint' => '100',
							'null' => TRUE,
						),
						'qr' => array(
							'type' => 'VARCHAR',
							'constraint' => '100',
							'null' => TRUE,
						),
						'puntos' => array(
							'type' => 'int',
							'constraint' => '255',
							'null' => TRUE,
						),
						'perfil' => array(
							'type' => 'tinyint',
							'constraint' => '1',
							'null' => TRUE,
						),
						'estado' => array(
							'type' => 'tinyint',
							'constraint' => '1',
							'null' => TRUE,
						),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('usuarios');
        }

        public function down()
        {
                $this->dbforge->drop_table('usuarios');
        }
}
