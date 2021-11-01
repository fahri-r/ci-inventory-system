<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Attributes extends Migration
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
                        'name'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => 255,
                        ],
                        'active' => [
                                'type' => 'BOOLEAN',
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
                $this->forge->createTable('attributes');
        }

        public function down()
        {
                $this->forge->dropTable('attributes');
        }
}
