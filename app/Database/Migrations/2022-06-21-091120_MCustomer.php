<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MCustomer extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => "INT",
				'auto_increment' => true
			],
			'kode' => [
				'type' => "VARCHAR",
				'constraint' => 10
			],
			'nama' => [
				'type' => "VARCHAR",
				'constraint' => 100
			],
			'telp' => [
				'type' => "VARCHAR",
				'constraint' => 20
			],
		]);

		$this->forge->addKey('id');
		$this->forge->createTable('m_customer');
	}

	public function down()
	{
		$this->forge->dropTable('m_customer');
	}
}
