<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cetak laporan barang masuk</title>
</head>

<body>
    tanggal cetak : <?= date('d F Y'); ?>
    <table width="100%" style="border: 0.1em solid #000000;" cellpadding="8">
        <thead>
            <tr>
                <th>no</th>
                <th>kode barang</th>
                <th>nama barang</th>
                <th>jumlah</th>
                <th>tangal barang masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php $i= 1;
			foreach($semuabarang as $barang) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $barang['kode_barang'];?></td>
                <td><?= $barang['nama_barang'];?></td>
                <td><?= $barang['jumlah'];?></td>
                <td><?= date('d F Y', $barang['date_created']); ?></td>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</body>

</html>