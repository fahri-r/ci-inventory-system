<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrdersItem extends Migration
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
            'order_id'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'product_id'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'qty'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'rate'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'amount'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
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
        $this->forge->addForeignKey('order_id', 'orders', 'id');
        $this->forge->addForeignKey('product_id', 'products', 'id');
        $this->forge->createTable('orders_item');
    }

    public function down()
    {
        $this->forge->dropTable('orders_item');
    }
}
