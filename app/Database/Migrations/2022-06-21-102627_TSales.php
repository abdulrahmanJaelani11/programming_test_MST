<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TSales extends Migration
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
				'constraint' => 15
			],
			'tanggal' => [
				'type' => "DATETIME",
			],
			'cus_id' => [
				'type' => "INT",
			],
			'sub_total' => [
				'type' => "VARCHAR",
				'constraint' => 100
			],
			'diskon' => [
				'type' => "VARCHAR",
				'constraint' => 100
			],
			'ongkir' => [
				'type' => "VARCHAR",
				'constraint' => 100
			],
			'total' => [
				'type' => "VARCHAR",
				'constraint' => 100
			],
		]);
		$this->forge->addKey('id');
		$this->forge->createTable('t_sales');
	}

	public function down()
	{
		$this->forge->dropTable('t_sales');
	}
}
