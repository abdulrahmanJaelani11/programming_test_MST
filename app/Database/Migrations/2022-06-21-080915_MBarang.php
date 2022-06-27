<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MBarang extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => "INT",
				'auto_increment' => true,
				'unsigned' => true
			],
			'kode' => [
				'type' => "VARCHAR",
				'constraint' => 10
			],
			'nama' => [
				'type' => "VARCHAR",
				'constraint' => 100
			],
			'harga' => [
				'type' => "DECIMAL",
			]
		]);
		$this->forge->addKey('id');
		$this->forge->createTable("m_barang");
	}

	public function down()
	{
		$this->forge->dropTable("m_barang");
	}
}
