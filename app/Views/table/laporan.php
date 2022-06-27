<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        table,
        th,
        td {
            border: 1 solid black;
        }

        table {
            margin: auto;
            width: 95%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        th {
            background-color: beige;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Laporan Transaksi</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered text-center" id="table-1">
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
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['no_transaksi']; ?></td>
                        <td><?= $row['tanggal']; ?></td>
                        <td><?= $row['nama']; ?></td>
                        <td><?= $row['jumlah_barang']; ?></td>
                        <td>Rp. <?= $row['sub_total'] != '' ? number_format($row['sub_total'], 0, ',', '.') : '0'; ?></td>
                        <td>Rp. <?= $row['diskon'] != '' ? number_format($row['diskon'], 0, ',', '.') : '0'; ?></td>
                        <td>Rp. <?= $row['ongkir'] != '' ? number_format($row['ongkir'], 0, ',', '.') : '0'; ?></td>
                        <td>Rp. <?= $row['total'] != '' ? number_format($row['total'], 0, ',', '.') : '0'; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>