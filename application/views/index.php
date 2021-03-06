<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title><?= $title; ?></title>
</head>

<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?= form_open_multipart('laporan/uploaddata') ?>
                        <div class="row">
                            <div class="col-4">
                                <input type="file" class="form-control-file" id="importexcel" name="importexcel"
                                    accept=".xlsx,.xls">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">import</button>
                            </div>
                            <div class="col">
                                <?= $this->session->flashdata('pesan'); ?>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <form class="mb-4" method="GET" action="">
                            <div class="row">
                                <div class="col-3">
                                    <input type="date" class="form-control" name="tanggalawal">
                                </div>
                                <div class="col-3">
                                    <input type="date" class="form-control" name="tanggalakhir">
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary">cari</button>
                                </div>
                            </div>
                        </form>
                        <?php 
						$tanggalawal = $this->input->get('tanggalawal');
						$tanggalakhir = $this->input->get('tanggalakhir');
						?>
                        <?php if(!$tanggalawal && !$tanggalakhir): ?>
                        <a href="<?= base_url('laporan/mpdf');?>" class="btn btn-danger">export pdf</a>
                        <a href="<?= base_url('laporan/excel');?>" class="btn btn-success">export excel</a>
                        <a href="<?= base_url('laporan/highchart');?>" class="btn btn-info">export grafik</a>
                        <h4 class="text-center mt-2">laporan barang masuk tanggal <?= date('d F Y'); ?></h4>
                        <?php else : ?>
                        <a href="<?= base_url('laporan/mpdf?tanggalawal='.$tanggalawal.'&tanggalakhir='.$tanggalakhir); ?>"
                            class="btn btn-danger">export pdf</a>
                        <a href="<?= base_url('laporan/excel?tanggalawal='.$tanggalawal.'&tanggalakhir='.$tanggalakhir); ?>"
                            class="btn btn-success">export excel</a>
                        <a href="<?= base_url('laporan/highchart?tanggalawal='.$tanggalawal.'&tanggalakhir='.$tanggalakhir); ?>"
                            class="btn btn-info">export grafik</a>
                        <h4 class="text-center mt-2">laporan barang masuk tanggal
                            <?= $tanggalawal . ' sampai dengan ' . $tanggalakhir ?></h4>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">kode barang</th>
                                    <th scope="col">nama barang</th>
                                    <th scope="col">jumlah</th>
                                    <th scope="col">tanggal masuk barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($semuabarang as $barang ) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $barang['kode_barang']; ?></td>
                                    <td><?= $barang['nama_barang']; ?></td>
                                    <td><?= $barang['jumlah']; ?></td>
                                    <td><?= date('d F Y', $barang['date_created']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>


</html>

</html>