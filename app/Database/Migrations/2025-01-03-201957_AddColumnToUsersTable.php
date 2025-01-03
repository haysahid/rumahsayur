<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColumnToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'disabled_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'role_id',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'disabled_at');
    }
}
