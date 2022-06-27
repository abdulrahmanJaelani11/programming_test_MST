<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div id="formTambahBarang"></div>
<div class="row justify-content-center">
    <div class="col-md-6" id="formCardUbahBarang" style="position: absolute; z-index: 21; display: none;">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post" class="formUbahBarang">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="hidden" name="id" id="id" class="form-control" readonly>
                        <input type="text" name="kode" id="u_kode" class="form-control" value="" readonly>
                        <div class="invalid-feedback invalid-kode"></div>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama barang</label>
                        <input type="text" name="nama_barang" id="u_nama_barang" class="form-control">
                        <div class="invalid-feedback invalid-nama-barang"></div>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="u_harga" class="form-control">
                        <div class="invalid-feedback invalid-harga"></div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" name="kirim" class="btn btn-block btn-info" onclick="hideform(`formCardUbahBarang`, `bg-blur`)"> Batal </button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" onclick="saveBarang(`<?= base_url('Proses/prosesUbahBarang'); ?>`, `formUbahBarang`, `Proses/getTable2/Barang/BarangModel/SELECT * FROM m_barang`, `formCardUbahBarang`, `bg-blur`)" name="kirim" class="btn btn-block btn-primary"> <i class="fa fa-fw fa-save"></i> Simpan </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="card shadow">
    <div class="card-body">
        <button type="button" name="kirim" class="btn btn-primary mb-2" onclick="showform(`formCardTambahBarang`, `bg-blur`)"> Tambah Barang </button>
        <div id="table"></div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    function getForm(url) {
        $.ajax({
            url: url,
            type: "post",
            dataType: 'json',
            success: function(data) {
                $("#formTambahBarang").html(data)
            }
        });

    }



    function getId(url) {
        showform(`formCardUbahBarang`, `bg-blur`)
        $.ajax({
            url: url,
            type: "post",
            dataType: 'json',
            success: function(data) {
                console.log(data)
                $("#id").val(data.id_barang)
                $("#u_kode").val(data.kode)
                $("#u_nama_barang").val(data.nama_barang)
                $("#u_harga").val(data.harga)
            }
        });
    }

    getForm(`<?= base_url('Proses/getForm/formTambahBarang'); ?>`)

    getTable(`<?= base_url("Proses/getTable2/Barang/BarangModel/SELECT * FROM m_barang"); ?>`)


    $("input").click(function() {
        $(this).removeClass('is-invalid')
    })

    function showform(idForm, bg) {
        $("#" + idForm).slideToggle()
        $("." + bg).fadeToggle()
    }

    function hideform(idForm, bg) {
        $("#" + idForm).slideToggle()
        $("." + bg).fadeToggle()
    }


    function saveBarang(url, classForm, linkTable = null, idCardForm = null, bg = null) {
        $.ajax({
            url: url,
            type: "post",
            data: $("." + classForm).serialize(),
            dataType: 'json',
            success: function(data) {
                console.log(data)
                if (data.status == 200) {
                    Swal.fire("Berhasil", data.pesan, "success");
                    getTable(linkTable)
                    hideform(idCardForm, bg)
                    $("#nama_barang").val('')
                    $("#harga").val('')
                    getForm('<?= base_url('Proses/getForm/formTambahBarang'); ?>')
                }
                if (data.status == 400) {
                    if (data.pesan.kode) {
                        $("#kode").addClass('is-invalid')
                        $(".invalid-kode").text(data.pesan.kode)
                    }
                    if (data.pesan.nama_barang) {
                        $("#nama_barang").addClass('is-invalid')
                        $(".invalid-nama-barang").text(data.pesan.nama_barang)
                    }
                    if (data.pesan.harga) {
                        $("#harga").addClass('is-invalid')
                        $(".invalid-harga").text(data.pesan.harga)
                    }
                }
            }
        });
    }
</script>
<?= $this->endSection(); ?>