<?php
require 'config.php';


$nama = $_POST['nama'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];
$nama_kampus = $_POST['nama_kampus'];
$alamat_kota = $_POST['alamat_kota'];
$ipk = $_POST['ipk'];
$ipk_predikat = $_POST['ipk_predikat'];
$ringkasan = $_POST['ringkasan'];
$hobi_utama = $_POST['hobi_utama'];
$sosmed_link = $_POST['sosmed_link'];
$skill_php_score = $_POST['skill_php_score'];
$skill_sql_score = $_POST['skill_sql_score'];
$skill_desain_score = $_POST['skill_desain_score'];


$query = "UPDATE mahasiswa_final SET 
    nama = '$nama',
    jurusan = '$jurusan',
    nama_kampus = '$nama_kampus',
    alamat_kota = '$alamat_kota',
    ipk = '$ipk',
    ipk_predikat = '$ipk_predikat',
    ringkasan = '$ringkasan',
    hobi_utama = '$hobi_utama',
    sosmed_link = '$sosmed_link',
    skill_php_score = '$skill_php_score',
    skill_sql_score = '$skill_sql_score',
    skill_desain_score = '$skill_desain_score'
    WHERE nim = '$nim'";


mysqli_query($koneksi, $query);


header("Location: index.php");
exit();
?>