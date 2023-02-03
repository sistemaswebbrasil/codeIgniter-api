<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePerson extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 255,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],            
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'note' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],            
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('people');
    }

    public function down()
    {
        $this->forge->dropTable('people');
    }
}
