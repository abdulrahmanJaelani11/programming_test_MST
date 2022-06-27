<?= $this->extend('template/table'); ?>

<?= $this->section('content'); ?>
<div class="table-responsive">
    <table class="table table-striped table-bordered" id="table-1">
        <thead>
            <tr>
                <th class="text-center">
                    NO
                </th>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th width="200px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($Barang as $row) : ?>
                <tr>
                    <td class="text-center"><?= $i++; ?></td>
                    <td><?= $row['kode']; ?></td>
                    <td><?= $row['nama_barang']; ?></td>
                    <td>Rp. <?= $row['harga'] != null ? number_format($row['harga'], 0, ',', '.') : '0'; ?></td>
                    <td>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" onclick="getId(`<?= base_url('Proses/getIDbarang/' . $row['id_barang']); ?>`)" name="kirim" class="btn btn-block btn-info"> <i class="fa fa-fw fa-edit"></i> </button>
                            </div>
                            <div class="col-6">
                                <button type="button" name="kirim" class="btn btn-danger btn-block" onclick="hapus(`<?= base_url('Proses/hapusBarang/' . $row['kode']); ?>`, `Proses/getTable2/Barang/BarangModel/SELECT * FROM m_barang`)"> <i class="fa fa-trash"></i> </button>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>