<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div class="card shadow">
    <div class="card-header">
        <h4><?= $title; ?></h4>
    </div>
    <div class="card-body">
        <a href="<?= base_url("Proses/cetak"); ?>" class="btn btn-info mb-3" target="_blank"><i class="fa fa-fw fa-print"></i> Print</a>
        <div id="table"></div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    getTable(`<?= base_url("Proses/getTable2/Transaksi/TsalesDetModel/SELECT * FROM t_sales_det JOIN m_customer ON t_sales_det.id_cus=m_customer.id_customer"); ?>`)
</script>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    function getPencarian() {
        $.ajax({
            url: "<?= base_url('Proses/PencarianTransaksi'); ?>",
            type: "post",
            dataType: 'json',
            data: {
                keyword: $("#pencarian").val()
            },
            success: function(data) {
                // console.log(data)
                $("#table").html(data)
            }
        });
    }
</script>
<?= $this->endSection(); ?>