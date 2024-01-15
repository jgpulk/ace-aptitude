<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuestionPoolTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'question_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
                'primary' => true,
            ],
            'section' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'sub_section' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => NULL
            ],
            'question' => [
                'type' => 'TEXT'
            ],
            'option_a' => [
                'type' => 'TEXT'
            ],
            'option_b' => [
                'type' => 'TEXT'
            ],
            'option_c' => [
                'type' => 'TEXT',
                'default' => NULL
            ],
            'option_d' => [
                'type' => 'TEXT',
                'default' => NULL
            ],
            'option_e' => [
                'type' => 'TEXT',
                'default' => NULL
            ],
            'option_f' => [
                'type' => 'TEXT',
                'default' => NULL
            ],
            'answer' => [
                'type' => 'TINYINT'
            ],
            'explanation' => [
                'type' => 'TEXT',
                'default' => NULL
            ],
            'difficulty' => [
                'type' => 'TEXT'
            ],
            'status' => [
                'type' => 'TINYINT',
                'default' => 1
            ]
        ]);

        $this->forge->addKey('question_id', true);
        $this->forge->createTable('question_pool');
    }

    public function down()
    {
        $this->forge->dropTable('question_pool');
    }
}
