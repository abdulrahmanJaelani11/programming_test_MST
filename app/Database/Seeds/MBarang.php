<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MBarang extends Seeder
{
	public function run()
	{
		$data = [
			[
				'kode' => "B001",
				'nama' => "Barang B",
				'harga' => 20000
			],
			[
				'kode' => "C001",
				'nama' => "Barang C",
				'harga' => 20000
			],
			[
				'kode' => "D001",
				'nama' => "Barang D",
				'harga' => 20000
			],
			[
				'kode' => "E001",
				'nama' => "Barang E",
				'harga' => 20000
			],
			[
				'kode' => "F001",
				'nama' => "Barang F",
				'harga' => 20000
			],
			[
				'kode' => "G001",
				'nama' => "Barang G",
				'harga' => 20000
			],
		];

		$this->db->table('m_barang')->insertBatch($data);
	}
}
