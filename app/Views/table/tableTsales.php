<?= $this->extend('template/table'); ?>

<?= $this->section('content'); ?>
<?php if (count($Tsales) > 0) : ?>
    <div class="card shadow">
        <div class="card-body">
            <p class="text-dark">Nama : <?= $Tsales[0]['nama']; ?></p>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table-1">
                    <thead>
                        <tr>
                            <th class="text-center">
                                NO
                            </th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Diskon</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($Tsales as $row) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['kode']; ?></td>
                                <td><?= $row['nama_barang']; ?></td>
                                <td><?= $row['jumlah']; ?></td>
                                <td>Rp. <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                                <td>Rp. <?= number_format($row['sub_total'], 0, ',', '.'); ?></td>
                                <td>Rp. <?= $row['diskon'] != null ? number_format($row['diskon'], 0, ',', '.') : '0'; ?></td>
                                <td>Rp. <?= number_format($row['total'], 0, ',', '.'); ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" onclick="getId('<?= base_url('Proses/getIdTsales/' . $row['id_sales']); ?>')" name="kirim" class="btn btn-info btn-block"> <i class="fa fa-edit"></i> </button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" onclick="hapus_Tsales(`<?= base_url('Proses/prosesHapus/' . $row['id_sales'] . '/TsalesModel/t_sales/id_sales'); ?>`)" name="kirim" class="btn btn-danger btn-block"> <i class="fa fa-trash"></i> </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <th colspan="3">Total Yang Harus Dibayar</th>
                            <td><?= $jumlah; ?></td>
                            <td colspan="3"></td>
                            <td>Rp. <?= number_format($total, 0, ',', '.'); ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form action="" method="post" class="formSimpanTsalesDet">
                <div class="hide" style="display: none;">
                    <label for="id_cus">Cus ID</label>
                    <input type="number" name="id_cus" id="id_cus" class="form-control" value="<?= $Tsales[0]['cus_id']; ?>">
                    <label for="tanggal">Tanggal</label>
                    <input type="text" name="tanggal" id="tanggal" class="form-control" value="<?= $Tsales[0]['tanggal']; ?>">
                    <label for="no_transaksi">No Transaksi</label>
                    <input type="text" name="no_transaksi" id="no_transaksi" class="form-control" value="<?= $Tsales[0]['no_transaksi']; ?>">
                    <label for="jumlah_barang">Jumlah Barang</label>
                    <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control" value="<?= $jumlah; ?>">
                    <label for="sub_total">Ongkir</label>
                    <input type="text" name="sub_total" id="sub_total" class="form-control" value="<?= $totalHarga; ?>">
                    <label for="total">Total</label>
                    <input type="text" name="total" id="total" class="form-control" value="<?= $total; ?>">
                </div>
                <div class="row">
                    <div class="col-md-7"></div>
                    <div class="col-md-5">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="diskon">Diskon</label>
                                <input type="text" name="diskon" id="diskon" class="form-control" placeholder="Diskon (Optional)">
                            </div>
                            <div class="col-md-6">
                                <label for="ongkir">Ongkir</label>
                                <input type="text" name="ongkir" id="ongkir" class="form-control" placeholder="Ongkir (Optional)">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" onclick="simpanData(`<?= base_url('Proses/prosesSimpanTsalesDet'); ?>`, `formSimpanTsalesDet`, `<?= base_url('Proses/getTable/Tsales/TsalesModel'); ?>`)" name="kirim" class="btn btn-primary"> Simpan </button>
                            <!-- SimpanData('url','class_form', 'linkGetTable') -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endif ?>
<?= $this->endSection(); ?>