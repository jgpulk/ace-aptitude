<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateUsersStatusVerifications extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'is_email_verified' => [
                'type' => 'BOOLEAN',
                'default' => 0
            ],
            'is_phone_verified' => [
                'type' => 'BOOLEAN',
                'default' => 0
            ],
            'notification_status' => [
                'type' => 'BOOLEAN',
                'default' => 1
            ],
            'account_status' => [
                'type' => 'BOOLEAN',
                'default' => 1
            ]
        ]);

        $sql = "ALTER TABLE `users` 
            CHANGE `is_email_verified` `is_email_verified` TINYINT(1) NULL DEFAULT '0' AFTER `password`,
            CHANGE `is_phone_verified` `is_phone_verified` TINYINT(1) NULL DEFAULT '0' AFTER `is_email_verified`,
            CHANGE `notification_status` `notification_status` TINYINT(1) NULL DEFAULT '1' AFTER `is_phone_verified`,
            CHANGE `account_status` `account_status` TINYINT(1) NULL DEFAULT '1' AFTER `notification_status`";

        $this->db->query($sql);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'is_email_verified');
        $this->forge->dropColumn('users', 'is_phone_verified');
        $this->forge->dropColumn('users', 'notification_status');
        $this->forge->dropColumn('users', 'account_status');
    }
}
