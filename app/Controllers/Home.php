<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\CustomerModel;
use App\Models\TsalesDetModel;
use App\Models\TsalesModel;

class Home extends BaseController
{
	protected $BarangModel;
	protected $CustomerModel;
	protected $TsalesModel;
	protected $TsalesDetModel;

	public function __construct()
	{
		$this->BarangModel = new BarangModel();
		$this->CustomerModel = new CustomerModel();
		$this->TsalesModel = new TsalesModel();
		$this->TsalesDetModel = new TsalesDetModel();
	}

	public function page()
	{

		$data = [
			'title' => "Home",
			'barang' => $this->BarangModel->findAll(),
			'customer' => $this->CustomerModel->findAll(),

		];
		return view('index', $data);
	}

	public function daftarTransaksi()
	{
		$data = [
			'title' => "Daftar Transaksi"
		];

		return view('dataTransaksi', $data);
	}

	public function detail($no_transaksi)
	{
		$dataTransaksi = $this->TsalesModel->db->query("SELECT * FROM `t_sales` WHERE no_transaksi = '$no_transaksi'")->getResultArray();
		$query = $this->TsalesModel->db->query("SELECT * FROM t_sales JOIN m_customer ON t_sales.cus_id=m_customer.id_customer JOIN m_barang ON m_barang.kode=t_sales.kode WHERE  t_sales.no_transaksi = '$no_transaksi'")->getResultArray();
		$TsalesDetModel = $this->TsalesDetModel->db->query("SELECT * FROM t_sales_det WHERE no_transaksi = '$no_transaksi'")->getRowArray();
		$total = [];
		$jumlah = [];
		$totalHarga = [];
		for ($i = 0; $i < count($dataTransaksi); $i++) {
			$total[] = $dataTransaksi[$i]['total'];
			$jumlah[] = $dataTransaksi[$i]['jumlah'];
			$totalHarga[] = $dataTransaksi[$i]['sub_total'];
		}

		$totalnya = array_sum($total);
		if ($TsalesDetModel['diskon'] != '') {
			$totalnya = $totalnya - $TsalesDetModel['diskon'];
		} else {
			$totalnya = $totalnya;
		}
		$jumlahnya = array_sum($jumlah);
		$data = [
			'title' => "Detail Transaksi",
			'Tsales' => $query,
			'total' => $totalnya,
			'jumlah' => $jumlahnya,
			'diskon' => $TsalesDetModel['diskon'],
			'no_transaksi' => $no_transaksi
		];

		return view("detailTransaksi", $data);
	}

	public function tambahBarang()
	{
		$data = [
			'title' => "Tambah Barang",
			'barang' => $this->BarangModel->findAll(),
		];

		return view('tambahBarang', $data);
	}
}
