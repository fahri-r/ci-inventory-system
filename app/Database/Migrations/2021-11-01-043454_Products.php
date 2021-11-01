<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
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
            'sku'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'price'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'qty'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'image'       => [
                'type'       => 'TEXT'
            ],
            'description'       => [
                'type'       => 'TEXT'
            ],
            'attribute_value_id'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'brand_id'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'category_id'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'store_id'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'availability'       => [
                'type'           => 'BOOLEAN',
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
        $this->forge->addForeignKey('attribute_value_id', 'attribute_value', 'id');
        $this->forge->addForeignKey('brand_id', 'brands', 'id');
        $this->forge->addForeignKey('category_id', 'categories', 'id');
        $this->forge->addForeignKey('store_id', 'stores', 'id');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
