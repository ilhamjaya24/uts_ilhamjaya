<?php
$public_path = "http://localhost:";
$username = 'root';
$password = '';
$database = 'db_bukuku';

$koneksi = new mysqli('localhost', $username, $password, $database);

if ($koneksi->connect_error) {
    die('Connection Failed');
}

$sql = "SELECT * FROM tbl_buku";
$hasil = $koneksi->query($sql);

