<?php
require_once('koneksi.php');

$sql = "SELECT * FROM tbl_jenis_buku";
$hasil = $koneksi->query($sql);
$dataisi = $hasil->fetch_assoc();

if ($dataisi['jenis_buku'] == 1) {
    $jb = 'Motivasi';
} else if ($dataisi['jenis_buku'] == 2) {
    $jb = 'Novel';
} else if ($dataisi['jenis_buku'] == 3) {
    $jb = 'Biografi';
} else if ($dataisi['jenis_buku'] == 4) {
    $jb = 'Mata Pelajaran';
} else if ($dataisi['jenis_buku'] == 5) {
    $jb = 'Komik';
} else {
    $jb = 'Kode Bermasalah';
}





if (isset($_POST['submit'])) {
    $kd_buku = $_POST['kd_buku'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $tanggal_cetak = $_POST['tanggal_cetak'];
    $jml_halaman = $_POST['jml_halaman'];
    $jenis_buku = $_POST['jenis_buku'];

    // SQL Insert to Database db_surat
    $insert_sql = "INSERT INTO tbl_buku (id, kd_buku, judul_buku, penulis, penerbit, tahun_terbit, tanggal_cetak, jml_halaman, jenis_buku) VALUES ('', '$kd_buku', '$judul_buku', '$penulis',
        '$penerbit' , '$tahun_terbit', '$tanggal_cetak', '$jml_halaman',' $jenis_buku')";
    $insert = $koneksi->query($insert_sql);

    if ($insert) {
         // header("Location:view.php?pesan=success");
 ?>
        <script>
            alert('DATA BERHASIL DITAMBAHKAN');
            window.location.href = '<?= "view.php" ?>';
        </script>
    <?php

    } else {
    ?>
        <script>
            alert('Failed insert data');
        </script>
<?php
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <div class="main mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white text-uppercase">
                            <div class="h3 text-center">Tambah Data BUku</div>
                        </div>
                        <div class="card-body">
                            <form action="add_proses.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <small>KODE BUKU</small>
                                            <input type="text" name="kd_buku" id="kd_buku" class="form-control" placeholder="Masukan Kode Buku" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group" style="margin-top:-15px;">
                                            <small>JUDUL BUKU</small>
                                            <input type="text" name="judul_buku" id="judul_buku" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>PENULIS </small>
                                            <input type="text" name="penulis" id="penulis" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>PENERBIT</small>
                                            <input type="text" name="penerbit" id="penerbit" class="form-control" required>
                                        </div>
                                    </div>
                                     <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>TAHUN TERBIT</small>
                                            <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>TANGGAL CETAK</small>
                                            <input type="date" name="tanggal_cetak" id="tanggal_cetak" class="form-control" required>
                                        </div>
                                    </div>
                                     <div class="col-lg-6 mt-3">
                                        <div class="form-group">
                                            <small>JUMLAH HALAMAN</small>
                                            <input type="text" name="jml_halaman" id="jml_halaman" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" style="margin-top: 15px;">
                                            <small>JENIS BUKU</small>
                                            <select name="jenis_buku" id="jenis_buku" class="form-control" required>
                                               <option value="">Silahkan Pilih...</option>
                                               <?php 
                                                foreach ($hasil as $jb ) {

                                               ?>
                                                <option value="<?=$jb['id']?>"><?=$jb['jenis_buku']?></option>
                                                <?php
                                                    }
                                                ?>
                                              
                                            </select>
                                        </div>
                                    </div></div>
                                    <div class="col-lg-6 mt-4">
                                        <button type="submit" name="submit" class="btn btn-info text-white">Tambah</button>
                                        <a href="view.php" class="btn btn-danger">Cancel</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> -->
    <script src="assets/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<!-- Proses Add Data -->


</body>

</html>