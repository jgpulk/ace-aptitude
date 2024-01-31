<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestDefinition extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'test_definition_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
                'primary' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'definition' => [
                'type' => 'JSON'
            ]
        ]);

        $this->forge->addKey('test_definition_id', true);
        $this->forge->createTable('test_definition');
    }

    public function down()
    {
        $this->forge->dropTable('test_definition');
    }
}
