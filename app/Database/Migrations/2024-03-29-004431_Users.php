<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
	    $this->forge->addField([
		    'user_id' => [
			    'type'           => 'INT',
			    'constraint'     => 11,
			    'unsigned'       => true,
			    'auto_increment' => true,
		    ],
		    'name' => [
			    'type'       => 'VARCHAR',
			    'constraint' => '250',
		    ],
		    'email' => [
			    'type'       => 'VARCHAR',
			    'constraint' => '250',
		    ],
		    'password' => [
			    'type'       => 'VARCHAR',
			    'constraint' => '250',
		    ],
		    'type' => [
			    'type'       => 'ENUM',
			    'constraint' => ['free', 'paid', 'master'],
			    'default'    => 'free',
		    ],
		    'pic' => [
			    'type'       => 'VARCHAR',
			    'constraint' => '250',
		    ],
		    'phone' => [
			    'type'       => 'VARCHAR',
			    'constraint' => '250',
		    ],
	    ]);
	    $this->forge->addKey('user_id', true);
	    $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
