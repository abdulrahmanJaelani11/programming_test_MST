<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\CustomerModel;
use App\Models\TsalesDetModel;
use App\Models\TsalesModel;
use Dompdf\Dompdf;

class Proses extends BaseController
{
    protected $BarangModel;
    protected $CustomerModel;
    protected $TsalesModel;
    protected $TsalesDetModel;
    protected $validasi;

    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->CustomerModel = new CustomerModel();
        $this->TsalesModel = new TsalesModel();
        $this->TsalesDetModel = new TsalesDetModel();
        $this->validasi = \Config\Services::validation();
    }

    function pesanSukses($pesan)
    {
        $data = [
            'status' => 200,
            'pesan' => $pesan
        ];

        echo json_encode($data);
    }

    public function getTable($table_name, $Model, $no_transaksi = null)
    {
        $dataTransaksi = $this->TsalesModel->db->query("SELECT * FROM `t_sales` WHERE no_transaksi = '$no_transaksi'")->getResultArray();
        // echo json_encode($dataTransaksi);
        // die;
        $total = [];
        $jumlah = [];
        $totalHarga = [];
        for ($i = 0; $i < count($dataTransaksi); $i++) {
            $total[] = $dataTransaksi[$i]['total'];
            $jumlah[] = $dataTransaksi[$i]['jumlah'];
            $totalHarga[] = $dataTransaksi[$i]['sub_total'];
        }

        $totalnya = array_sum($total);
        $jumlahnya = array_sum($jumlah);
        $totalHarganya = array_sum($totalHarga);

        $data = [
            "$table_name" => $this->$Model->db->query("SELECT * FROM t_sales JOIN m_customer ON t_sales.cus_id=m_customer.id_customer JOIN m_barang ON m_barang.kode=t_sales.kode WHERE  t_sales.no_transaksi = '$no_transaksi'")->getResultArray(),
            'total' => $totalnya,
            'jumlah' => $jumlahnya,
            'totalHarga' => $totalHarganya,
        ];
        // var_dump($data);
        // die;
        $view = view("table/table" . $table_name, $data);
        echo json_encode($view);
    }

    public function getTable2($table_name, $model, $query)
    {
        $data = [
            "$table_name" => $this->$model->db->query("$query")->getResultArray()
        ];

        $view = view("table/table" . $table_name, $data);
        echo json_encode($view);
    }

    public function getForm($nama_file)
    {
        echo json_encode(view('table/' . $nama_file));
    }

    public function prosesSimpan()
    {
        $data = $this->request->getVar();
        if (!$this->validate([
            'customer' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Maaf, Anda Belum Memasukan Customer"
                ]
            ],
            'tanggal' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Maaf Masukan Tanggal Terlebih Dahulu"
                ]
            ],
            'barang' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Maaf Barang Belum Dipilih"
                ]
            ],
            'jumlah' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Maaf Masukan Jumlah Barang"
                ]
            ],
        ])) {
            $pesan = [
                'status' => 400,
                'pesan' => [
                    'customer' => $this->validasi->getError('customer'),
                    'tanggal' => $this->validasi->getError('tanggal'),
                    'barang' => $this->validasi->getError('barang'),
                    'jumlah' => $this->validasi->getError('jumlah'),
                ]
            ];
            echo json_encode($pesan);
        } else {
            $dataBarang = $this->BarangModel->getWhere(['kode' => $data['barang']])->getRowArray();

            $sub_total = $dataBarang['harga'] * $data['jumlah'];
            if ($data['diskon']) {
                $total = $sub_total - $data['diskon'];
            } else {
                $total = $sub_total;
            }

            $noTransaksi = $data['no_transaksi'];
            $kodeBarang = $data['barang'];
            $queryBarang = $this->TsalesModel->db->query("SELECT * FROM t_sales WHERE no_transaksi = '$noTransaksi' AND kode = '$kodeBarang'")->getResultArray();
            if (count($queryBarang) > 0) {
                $pesan = [
                    'status' => 400,
                    'pesan' => [
                        'barang' => "Maaf Barang Sudah Terdata",
                    ]
                ];
                echo json_encode($pesan);
            } else {
                $this->TsalesModel->save([
                    'no_transaksi' => $data['no_transaksi'],
                    'kode' => $data['barang'],
                    'tanggal' => $data['tanggal'],
                    'cus_id' => $data['customer'],
                    'sub_total' => $sub_total,
                    'diskon' => $data['diskon'],
                    'ongkir' => $data['ongkir'],
                    'total' => $total,
                    'jumlah' => $data['jumlah']
                ]);
                $this->pesanSukses("Berhasil Menambahkan Barang");
            }
        }
    }

    public function prosesHapus($id, $model, $table, $id_col)
    {
        // echo $id;
        // die;
        // $this->$model->delete($id);
        $this->$model->db->query("DELETE FROM $table WHERE $id_col = $id");
        $this->pesanSukses('Berhasil Menghapus Barang');
    }

    public function prosesSimpanTsalesDet($data = null)
    {
        $data = $this->request->getVar();

        if ($data['diskon'] == "") {
            if ($data['ongkir'] == "") {
                $total = $data['total'];
            } else {
                $total = $data['total'] - $data['ongkir'];
            }
        } else {
            if ($data['ongkir'] == "") {
                $total = $data['total'] - $data['diskon'];
            } else {
                $total = $data['total'] - $data['ongkir'] - $data['diskon'];
            }
        }

        $this->TsalesDetModel->save([
            'no_transaksi' => $data['no_transaksi'],
            'tanggal' => $data['tanggal'],
            'id_cus' => $data['id_cus'],
            'jumlah_barang' => $data['jumlah_barang'],
            'sub_total' => $data['sub_total'],
            'diskon' => $data['diskon'],
            'ongkir' => $data['ongkir'],
            'total' => $total
        ]);
        $cus_id = $data['id_cus'];
        // $this->TsalesModel->db->query("DELETE FROM t_sales WHERE cus_id = $cus_id ");
        $this->pesanSukses("Berhasil Menyimpan Data");
    }

    public function cetak()
    {
        $dompdf = new Dompdf();
        $data = [
            'title' => "Cetak Laporan Transaksi",
            "data" => $this->TsalesDetModel->db->query("SELECT * FROM t_sales_det JOIN m_customer ON t_sales_det.id_cus=m_customer.id_customer")->getResultArray()
        ];

        $view = view('table/laporan', $data);
        $dompdf->load_html($view);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('Laporan Transaksi', array('Attachment' => false));
    }

    public function prosesSimpanBarang()
    {
        $data = $this->request->getVar();
        $cekValidasi = [
            'kode' => [
                'rules' => "required|is_unique[m_barang.kode]",
                'errors' => [
                    'required' => "Maaf, Kode Tidak Boleh Kosong",
                    'is_unique' => "Maaf, Kode Barang Sudah Terdata"
                ]
            ],
            'nama_barang' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Maaf, Nama Barang Tidak Boleh Kosong",
                ]
            ],
            'harga' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Maaf, Mohon Cantumkan harga barang",
                ]
            ],
        ];
        if (!$this->validate($cekValidasi)) {
            $pesan = [
                'status' => 400,
                'pesan' => [
                    'kode' => $this->validasi->getError('kode'),
                    'nama_barang' =>  $this->validasi->getError('nama_barang'),
                    'harga' => $this->validasi->getError('harga')
                ]
            ];
            echo json_encode($pesan);
        } else {
            $this->BarangModel->save([
                'kode' => htmlspecialchars($data['kode']),
                'nama_barang' => htmlspecialchars($data['nama_barang']),
                'harga' => htmlspecialchars($data['harga']),
            ]);
            $this->pesanSukses("Barhasil Menambahkan Data Barang");
        }
        // echo json_encode($data);
    }

    public function hapusBarang($kode)
    {
        $this->BarangModel->db->query("DELETE FROM m_barang WHERE kode = '$kode'");
        $this->pesanSukses('Berhasil Menghapus barang');
    }

    public function PencarianTransaksi()
    {
        $keyword = $this->request->getVar('keyword');

        $data = [
            'Transaksi' => $this->TsalesDetModel->db->query("SELECT * FROM t_sales_det JOIN m_customer ON t_sales_det.id_TsalesDet=m_customer.id_customer WHERE m_customer.nama LIKE '%$keyword%' OR t_sales_det.no_transaksi LIKE '%$keyword%'")->getResultArray()
        ];

        echo json_encode(view("table/tableTransaksi", $data));
    }

    public function getIDbarang($data)
    {
        $dataBarang = $this->BarangModel->find($data);

        echo json_encode($dataBarang);
    }

    public function prosesUbahBarang()
    {
        $data = $this->request->getVar();

        $this->BarangModel->update($data['id'], [
            'kode' => $data['kode'],
            'nama_barang' => $data['nama_barang'],
            'harga' => $data['harga']
        ]);

        $this->pesanSukses("Berhasil Mengubah Data Barang");
    }

    public function getIdTsales($id)
    {
        $dataTsales = $this->TsalesModel->find($id);
        echo json_encode($dataTsales);
    }

    public function prosesUbahTsales()
    {
        $data = $this->request->getVar();
        if (!$this->validate([
            'u_barang' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Maaf Barang Belum Dipilih"
                ]
            ],
            'u_jumlah' => [
                'rules' => "required",
                'errors' => [
                    'required' => "Maaf Masukan Jumlah Barang"
                ]
            ],
        ])) {
            $pesan = [
                'status' => 400,
                'pesan' => [
                    'u_barang' => $this->validasi->getError('u_barang'),
                    'u_jumlah' => $this->validasi->getError('u_jumlah'),
                ]
            ];
            echo json_encode($pesan);
        } else {
            $no_transaksi = $data['u_no_transaksi'];
            $kode = $data['u_barang'];
            $dataBarang = $this->TsalesModel->db->query("SELECT * FROM t_sales JOIN m_customer ON t_sales.cus_id=m_customer.id_customer JOIN m_barang ON m_barang.kode=t_sales.kode WHERE  t_sales.no_transaksi = '$no_transaksi' AND t_sales.kode = '$kode'")->getRowArray();

            $sub_total = $dataBarang['harga'] * $data['u_jumlah'];
            if ($data['u_diskon']) {
                $total = $sub_total - $data['u_diskon'];
                if ($data['u_ongkir']) {
                    $total = $total - $data['u_ongkir'];
                }
            } else {
                $total = $sub_total;
            }

            $this->TsalesModel->update($data['u_id_sales'], [
                'jumlah' => $data['u_jumlah'],
                'sub_total' => $sub_total,
                'diskon' => $data['u_diskon'],
                'ongkir' => $data['u_ongkir'],
                'total' => $total
            ]);

            $this->pesanSukses('Berhasil Mengubah barang');
        }
    }
}
