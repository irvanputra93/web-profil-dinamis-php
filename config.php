<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_mpsi_final';

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database GAGAL: " . mysqli_connect_error());
}

$query_sql = "SELECT * FROM mahasiswa_final WHERE id = 1";
$result = mysqli_query($koneksi, $query_sql);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
} else {
    die("Data profil tidak ditemukan di tabel mahasiswa_final.");
}
?>
