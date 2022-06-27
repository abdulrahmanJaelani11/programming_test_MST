<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MCustomer extends Seeder
{
	public function run()
	{
		$data = [
			[
				'kode' => "A203",
				'nama' => "Abdurahman Jaelani",
				'telp' => "083874809704"
			],
			[
				'kode' => "A203",
				'nama' => "Agung Wira",
				'telp' => "083874809704"
			],
			[
				'kode' => "A203",
				'nama' => "Andi Permana",
				'telp' => "083874809704"
			],
			[
				'kode' => "A203",
				'nama' => "Yoga Nugraha",
				'telp' => "083874809704"
			],
			[
				'kode' => "A203",
				'nama' => "Ridwan Maulana",
				'telp' => "083874809704"
			],
			[
				'kode' => "A203",
				'nama' => "Aditia Budiman",
				'telp' => "083874809704"
			],
		];

		$this->db->table('m_customer')->insertBatch($data);
	}
}
