<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TSalesDet extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => "INT",
				'auto_increment' => true
			],
			'no_transaksi' => [
				'type' => "VARCHAR",
				'constraint' => 100
			],
			'tanggal' => [
				'type' => "VARCHAR",
				'constraint' => 10
			],
			'id_cus' => [
				'type' => "VARCHAR",
				'constraint' => 100
			],
			'jumlah_barang' => [
				'type' => "VARCHAR",
				'constraint' => 100
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
		$this->forge->createTable('t_sales_det');
	}

	public function down()
	{
		$this->forge->dropTable('t_sales_det');
	}
}
