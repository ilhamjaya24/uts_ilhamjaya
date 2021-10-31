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


// proses untuk edit data
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $kd_buku = $_POST['kd_buku'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $tanggal_cetak = $_POST['tanggal_cetak'];
    $jml_halaman = $_POST['jml_halaman'];
    $jenis_buku = $_POST['jenis_buku'];


    // SQL Update to Databas
    $update_sql = "UPDATE tbl_buku SET 
    kd_buku='$kd_buku', judul_buku='$judul_buku', penulis='$penulis', penerbit='$penerbit',
    tahun_terbit='$tahun_terbit', tanggal_cetak='$tanggal_cetak', jml_halaman='$jml_halaman', 
    jenis_buku='$jenis_buku' WHERE id='$id'";
    $update = $koneksi->query($update_sql);

    if ($update) {
        // 
        ?>
        <script>
            alert('DATA BERHASIL DIRUBAH');
            window.location.href = '<?= "view.php" ?>';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Failed update data');
        </script>
<?php
    }
}


?>