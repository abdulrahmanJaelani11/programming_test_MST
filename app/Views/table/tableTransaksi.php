<?= $this->extend('template/table'); ?>

<?= $this->section('content'); ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered" id="table-1">
        <thead>
            <tr>
                <th class="text-center">
                    NO
                </th>
                <th>No Transaksi</th>
                <th>Tanggal</th>
                <th>Nama Customer</th>
                <th>Jumlah Barang</th>
                <th>Sub Total</th>
                <th>Diskon</th>
                <th>Ongkir</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($Transaksi as $row) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['no_transaksi']; ?></td>
                    <td><?= $row['tanggal']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['jumlah_barang']; ?></td>
                    <td>Rp. <?= number_format($row['sub_total'], 0, ',', '.'); ?></td>
                    <td>Rp. <?= $row['diskon'] != '' ? number_format($row['diskon'], 0, ',', '.') : '0'; ?></td>
                    <td>Rp. <?= $row['ongkir'] != '' ? number_format($row['ongkir']) : '0'; ?></td>
                    <td>Rp. <?= number_format($row['total'], 0, ',', '.'); ?></td>
                    <td>
                        <div class="row">
                            <div class="col-6">
                                <a href="<?= base_url('/detail/' . $row['no_transaksi']); ?>" class="btn btn-info btn-block"><i class="fas fa-list-ul"></i></a>
                            </div>
                            <div class="col-6">
                                <button type="button" onclick="hapus(`<?= base_url('Proses/prosesHapus/' . $row['id_TsalesDet'] . '/TsalesDetModel/t_sales_det/id_TsalesDet'); ?>`, `Proses/getTable2/Transaksi/TsalesDetModel`)" name="kirim" class="btn btn-danger btn-block"> <i class="fa fa-trash"></i> </button>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>