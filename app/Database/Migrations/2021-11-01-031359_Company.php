<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Company extends Migration
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
            'service_charge'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'vat_charge'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'address'       => [
                'type'       => 'TEXT',
            ],
            'phone'       => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
            ],
            'country'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'message'       => [
                'type'       => 'TEXT',
                'null'       => true
            ],
            'currency'       => [
                'type'       => 'VARCHAR',
                'constraint' => 3,
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
        $this->forge->createTable('company');
    }

    public function down()
    {
        $this->forge->dropTable('company');
    }
}
