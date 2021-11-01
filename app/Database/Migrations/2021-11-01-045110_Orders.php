<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration
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
            'bill_no'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'customer_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'customer_address'       => [
                'type'       => 'TEXT',
            ],
            'customer_phone'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'date_time'       => [
                'type'       => 'DATETIME',
            ],
            'gross_amount'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'service_charge_rate'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'service_charge'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'vat_charge_rate'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'vat_charge'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'net_amount'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'discount'       => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'paid_status'       => [
                'type'       => 'BOOLEAN',
            ],
            'user_id'       => [
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
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
