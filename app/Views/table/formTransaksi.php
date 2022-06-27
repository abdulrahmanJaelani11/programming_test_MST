<?php
function getNoTransaksi()
{
    return date('Ymd') . time();
}

?>

    <input type="text" name="no_transaksi" value="<?= getNoTransaksi(); ?>" id="no_transaksi" class="form-control" readonly>
    <select name="barang" id="barang" class="form-control">
                                <option value="">Pilih Barang</option>
                                <?php foreach ($barang as $row) : ?>
                                    <option value="<?= $row['kode']; ?>"><?= $row['nama_barang']; ?></option>
                                <?php endforeach; ?>
                            </select>