<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
            $this->forge->addField([
                    'id'          => [
                            'type'           => 'INT',
                            'constraint'     => 11,
                            'unsigned'       => true,
                            'auto_increment' => true,
                    ],
                    'first_name'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => 255,
                    ],
                    'last_name'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => 255,
                    ],
                    'email'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => 255,
                    ],
                    'password'       => [
                            'type'       => 'VARCHAR',
                            'constraint' => 255,
                    ],
                    'gender'       => [
                            'type'       => 'TINYINT',
                    ],
                    'group_id'       => [
                        'type'           => 'INT',
                        'constraint'     => 11,
                        'unsigned'       => true,
                    ],
                    'created_at' => [
                            'type' => 'DATETIME',
                            'null' => true,
                    ],
                    'updated_at' => [
                            'type' => 'DATETIME',
                            'null' => true,
                    ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('group_id', 'groups', 'id');
            $this->forge->createTable('users');
    }

    public function down()
    {
            $this->forge->dropTable('users');
    }
}
