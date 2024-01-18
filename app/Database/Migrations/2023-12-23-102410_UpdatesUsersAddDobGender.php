<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdatesUsersAddDobGender extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'dob' => [
                'type' => 'DATE',
                'default' => NULL
            ],
            'gender' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => NULL
            ]
        ]);

        $sql = "ALTER TABLE `users` 
            CHANGE `dob` `dob` DATE NULL DEFAULT NULL AFTER `password`,
            CHANGE `gender` `gender` VARCHAR(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL AFTER `dob`";

        $this->db->query($sql);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'dob');
        $this->forge->dropColumn('users', 'gender');
    }
}
