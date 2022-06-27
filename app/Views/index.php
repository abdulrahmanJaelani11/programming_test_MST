<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<?php
function getNoTransaksi()
{
    return date('Ymd') . time();
}

?>
<div class="card shadow">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post" class="formSimpanBarang">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="no_transaksi">No Transaksi</label>
                            <div class="row">
                                <div class="col-10">
                                    <input type="text" name="no_transaksi" value="<?= getNoTransaksi(); ?>" id="no_transaksi" class="form-control" readonly>
                                </div>
                                <div class="col-2">
                                    <button type="button" onclick="generateNoTransaksi()" name="kirim" class="btn btn-primary btn-block"> <i class="fas fa-retweet"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="customer">Nama Customer</label>
                            <select name="customer" id="customer" class="form-control">
                                <option value="">Customer</option>
                                <?php foreach ($customer as $row) : ?>
                                    <option value="<?= $row['id_customer']; ?>"><?= $row['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback invalid-customer"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                            <div class="invalid-feedback invalid-tanggal"></div>
                        </div>
                        <div class="col-md-6">
                            <label for="barang">Nama Barang</label>
                            <select name="barang" id="barang" class="form-control">
                                <option value="">Pilih Barang</option>
                                <?php foreach ($barang as $row) : ?>
                                    <option value="<?= $row['kode']; ?>"><?= $row['nama_barang']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback invalid-barang"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah barang">
                            <div class="invalid-feedback invalid-jumlah"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="diskon">Diskon (Optional)</label>
                                    <input type="text" name="diskon" id="diskon" class="form-control" placeholder="Diskon">
                                    <div class="invalid-feedback invalid-customer"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="ongkir">Ongkir (Optional)</label>
                                    <input type="text" name="ongkir" id="ongkir" class="form-control" placeholder="Ongkir">
                                    <div class="invalid-feedback invalid-customer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <button type="button" name="kirim" onclick="save_data(`<?= base_url('Proses/prosesSimpan'); ?>`, `formSimpanBarang`)" class="btn btn-primary"> Konfirmasi </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6" id="formCardUbahTsales" style="display: none;">
        <div class="card shadow">
            <div class="card-header">
                <h4>Ubah Barang</h4>
            </div>
            <div class="card-body">
                <form action="" method="post" class="formUbahBarang">
                    <div class="form-group">
                        <input type="hidden" name="u_id_sales" id="u_id_sales">
                        <input type="hidden" name="u_no_transaksi" id="u_no_transaksi">
                        <input type="hidden" name="u_sub_total" id="u_sub_total">
                        <input type="hidden" name="u_total" id="u_total">
                        <input type="hidden" name="u_barang" id="u_barang" class="form-control" readonly>
                        <div class="invalid-feedback invalid-u_barang"></div>
                    </div>
                    <div class="form-group">
                        <label for="u_jumlah">Jumlah</label>
                        <input type="number" name="u_jumlah" id="u_jumlah" class="form-control">
                        <div class="invalid-feedback invalid-u_jumlah"></div>
                    </div>
                    <div class="form-group">
                        <label for="u_diskon">Diskon</label>
                        <input type="number" name="u_diskon" id="u_diskon" class="form-control" placeholder="Masukan Diskon(Optional)">
                    </div>
                    <div class="form-group">
                        <label for="u_ongkir">Ongkir</label>
                        <input type="number" name="u_ongkir" id="u_ongkir" class="form-control" placeholder="Masukan Ongkir(Optional)">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" onclick="hideform(`formCardUbahTsales`, `null`)" name="kirim" class="btn btn-info btn-block"> Batal </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" onclick="save_data(`<?= base_url('Proses/prosesUbahTsales'); ?>`, `formUbahBarang`, `null`, `formCardUbahTsales`)" name="kirim" class="btn btn-primary btn-block"> Simpan </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="table"></div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    var noTransaksi = $("#no_transaksi").val()
    var linkTable = '<?= base_url('Proses/getTable/Tsales/TsalesModel'); ?>' + '/' + noTransaksi
    getTable(linkTable)
    console.log(noTransaksi)


    function getId(url) {
        showform(`formCardUbahTsales`)
        $.ajax({
            url: url,
            type: "post",
            dataType: 'json',
            success: function(data) {
                console.log(data)
                $("#u_id_sales").val(data.id_sales)
                $("#u_no_transaksi").val(data.no_transaksi)
                $("#u_sub_total").val(data.sub_total)
                $("#u_total").val(data.total)
                $("#u_jumlah").val(data.jumlah)
                $("#u_diskon").val(data.diskon)
                $("#u_ongkir").val(data.ongkir)
                $("#u_barang").val(data.kode)
            }
        });
    }

    function generateNoTransaksi() {
        $.ajax({
            url: "<?= base_url("Proses/getNoTransaksi"); ?>",
            type: 'post',
            success: function(data) {
                // console.log(data)
                $("#no_transaksi").val(data)
                resetForm()
                $("#customer").attr('readonly', false)
                $("#customer").val()
                linkTable = '<?= base_url('Proses/getTable/Tsales/TsalesModel'); ?>' + '/' + data
                getTable(linkTable)
            }
        });
    }

    function showform(idForm, bg = null) {
        $("#" + idForm).slideToggle()
        $("." + bg).fadeToggle()
    }

    function hideform(idForm, bg) {
        $("#" + idForm).slideToggle()
        $("." + bg).fadeToggle()
    }

    function removeError() {
        $('input').click(function() {
            $(this).removeClass('is-invalid')
        })
        $('select').click(function() {
            $(this).removeClass('is-invalid')
        })
    }

    function resetForm() {
        $("#customer").val('')
        $("#barang").val('')
        $("#jumlah").val('')
        $("#diskon").val('')
        $("#ongkir").val('')
    }

    removeError()

    function save_data(url, classForm, urlTable = null, classCardForm = null) {
        $.ajax({
            url: url,
            type: "post",
            data: $('.' + classForm).serialize(),
            dataType: 'json',
            success: function(data) {
                console.log(data)
                if (data.status == 200) {
                    $("#customer").attr('readonly', true)
                    $("#tanggal").attr('readonly', true)
                    $("#barang").val('')
                    $("#jumlah").val('')
                    $('input').removeClass('is-invalid')
                    $('select').removeClass('is-invalid')
                    Swal.fire(
                        'Berhasil',
                        data.pesan,
                        'success'
                    )
                    getTable(linkTable)
                    hideForm(classCardForm)
                }
                if (data.status == 400) {
                    if (data.pesan.no_transaksi) {
                        $("#no_transaksi").addClass('is-invalid')
                        $('.invalid-no_transaksi').text(data.pesan.no_transaksi)
                    }
                    if (data.pesan.customer) {
                        $("#customer").addClass('is-invalid')
                        $('.invalid-customer').text(data.pesan.customer)
                    }
                    if (data.pesan.tanggal) {
                        $("#tanggal").addClass('is-invalid')
                        $('.invalid-tanggal').text(data.pesan.tanggal)
                    }
                    if (data.pesan.barang) {
                        $("#barang").addClass('is-invalid')
                        $('.invalid-barang').text(data.pesan.barang)
                    }
                    if (data.pesan.jumlah) {
                        $("#jumlah").addClass('is-invalid')
                        $('.invalid-jumlah').text(data.pesan.jumlah)
                    }
                    if (data.pesan.u_jumlah) {
                        $("#u_jumlah").addClass('is-invalid')
                        $('.invalid-u_jumlah').text(data.pesan.u_jumlah)
                    }
                    if (data.pesan.u_barang) {
                        $("#u_barang").addClass('is-invalid')
                        $('.invalid-u_barang').text(data.pesan.u_barang)
                    }
                }
            }
        });
    }

    function simpanData(url, classForm, urlTable = null, classCardForm = null) {
        $.ajax({
            url: url,
            type: "post",
            data: $('.' + classForm).serialize(),
            dataType: 'json',
            success: function(data) {
                // console.log(data)
                if (data.status == 200) {
                    $("#customer").attr('readonly', false)
                    $("#tanggal").attr('readonly', false)
                    $("#barang").val('')
                    $("#jumlah").val('')
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: data.pesan,
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: 'Lihat',
                        denyButtonText: `Tidak`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            // Swal.fire('Saved!', '', 'success')
                            window.location = '<?= base_url('/daftar-transaksi'); ?>'
                        } else if (result.isDenied) {
                            window.location = '<?= base_url("/"); ?>'
                        }
                    })
                    hideForm(classCardForm)
                }
                if (data.status == 400) {
                    if (data.pesan.spesifik1) {
                        Swal.fire(
                            'Opsss..',
                            data.pesan.spesifik1,
                            'error'
                        )
                    }
                    if (data.pesan.spesifik2) {
                        Swal.fire(
                            'Opsss..',
                            data.pesan.spesifik2,
                            'error'
                        )
                    }
                }
            }
        });
    }

    function hapus_Tsales(url) {
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            success: function(data) {
                console.log(data);
                if (data.status == 200) {
                    Swal.fire("Berhasil", data.pesan, "success");
                    getTable(linkTable);
                    // resetForm()
                    $("#customer").attr('readonly', false)
                    // $("#customer").val()
                }
            },
        });
    }
</script>
<?= $this->endSection(); ?>