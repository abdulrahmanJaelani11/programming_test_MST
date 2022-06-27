<?php
function teksAcak($panjang = 10)
{
    $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' . time();
    $charLength = strlen($char);
    $acak = '';
    $i = 1;
    for ($i = 0; $i < $panjang; $i++) {
        $acak .= $char[rand(0, $charLength - 1)];
    }
    return $acak;
}
?>
<div class="row justify-content-center">
    <div class="col-md-6" id="formCardTambahBarang" style="position: absolute; z-index: 21; display: none;">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post" class="formTambahBarang">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode" id="kode" class="form-control" value="<?= teksAcak(5); ?>" readonly>
                        <div class="invalid-feedback invalid-kode"></div>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Masukan nama barang">
                        <div class="invalid-feedback invalid-nama-barang"></div>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan harga">
                        <div class="invalid-feedback invalid-harga"></div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" name="kirim" class="btn btn-block btn-info" onclick="hideform(`formCardTambahBarang`, `bg-blur`)"> Batal </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" onclick="saveBarang(`<?= base_url('Proses/prosesSimpanBarang'); ?>`, `formTambahBarang`, `Proses/getTable2/Barang/BarangModel/SELECT * FROM m_barang`, `formCardTambahBarang`, `bg-blur`)" name="kirim" class="btn btn-block btn-primary"> <i class="fa fa-fw fa-save"></i> Simpan </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>