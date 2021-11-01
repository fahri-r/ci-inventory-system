<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AttributeValue extends Migration
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
            'value'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'attribute_id' => [
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
        $this->forge->addForeignKey('attribute_id', 'attributes', 'id');
        $this->forge->createTable('attribute_value');
    }

    public function down()
    {
        $this->forge->dropTable('attribute_value');
    }
}
