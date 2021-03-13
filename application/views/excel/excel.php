<?php 
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");
header("Pragma: no-chace");
header("Expires: 0");

?>
<h3>laporan barang masuk : <?= date('d F Y'); ?></h3>
<table border="1" width="100%">
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
        <?php $i= 1; foreach($semuabarang as $barang) : ?>
        <tr>
            <td style="text-align: center;"><?= $i; ?></td>
            <td><?= $barang['kode_barang'];?></td>
            <td><?= $barang['nama_barang'];?></td>
            <td style="text-align: center;"><?= $barang['jumlah'];?></td>
            <td style="text-align: center;"><?= date('d F Y', $barang['date_created']); ?></td>
        </tr>
        <?php $i++; endforeach; ?>
    </tbody>
</table>