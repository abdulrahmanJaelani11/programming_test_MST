<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div class="card shadow">
    <div class="card-header">
        <h4>Detail Transaksi dengan No Transaksi : <?= $no_transaksi; ?></h4>
    </div>
    <div class="card-body">
        <p class="font-weight-bold">Nama Customer : <?= $Tsales[0]['nama']; ?><br>
            Telp : <?= $Tsales[0]['telp']; ?></p>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="table-1" style="margin: auto;">
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
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <th colspan="3">Total</th>
                        <td><?= $jumlah; ?></td>
                        <td colspan="2"></td>
                        <td>Rp. <?= $diskon != '' ? number_format($diskon, 0, ',', '.') : '0'; ?></td>
                        <td>Rp. <?= number_format($total, 0, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>