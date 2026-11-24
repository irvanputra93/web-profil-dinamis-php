<?php
require 'config.php';


$id = 1;
$query = "SELECT * FROM mahasiswa_final WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>
</head>
<body>
    <h1>Profil Mahasiswa</h1>
    <form action="update.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>"><br>

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo htmlspecialchars($data['nim']); ?>"><br>

        <label for="jurusan">Jurusan:</label>
        <input type="text" id="jurusan" name="jurusan" value="<?php echo htmlspecialchars($data['jurusan']); ?>"><br>

        <label for="nama_kampus">Nama Kampus:</label>
        <input type="text" id="nama_kampus" name="nama_kampus" value="<?php echo htmlspecialchars($data['nama_kampus']); ?>"><br>

        <label for="alamat_kota">Alamat Kota:</label>
        <input type="text" id="alamat_kota" name="alamat_kota" value="<?php echo htmlspecialchars($data['alamat_kota']); ?>"><br>

        <label for="ipk">IPK:</label>
        <input type="text" id="ipk" name="ipk" value="<?php echo htmlspecialchars($data['ipk']); ?>"><br>

        <label for="ipk_predikat">IPK Predikat:</label>
        <input type="text" id="ipk_predikat" name="ipk_predikat" value="<?php echo htmlspecialchars($data['ipk_predikat']); ?>"><br>

        <label for="ringkasan">Ringkasan:</label>
        <textarea id="ringkasan" name="ringkasan"><?php echo htmlspecialchars($data['ringkasan']); ?></textarea><br>

        <label for="hobi_utama">Hobi Utama:</label>
        <input type="text" id="hobi_utama" name="hobi_utama" value="<?php echo htmlspecialchars($data['hobi_utama']); ?>"><br>

        <label for="sosmed_link">Sosial Media Link:</label>
        <input type="text" id="sosmed_link" name="sosmed_link" value="<?php echo htmlspecialchars($data['sosmed_link']); ?>"><br>

        <label for="skill_php_score">Skill PHP Score:</label>
        <input type="text" id="skill_php_score" name="skill_php_score" value="<?php echo htmlspecialchars($data['skill_php_score']); ?>"><br>

        <label for="skill_sql_score">Skill SQL Score:</label>
        <input type="text" id="skill_sql_score" name="skill_sql_score" value="<?php echo htmlspecialchars($data['skill_sql_score']); ?>"><br>

        <label for="skill_desain_score">Skill Desain Score:</label>
        <input type="text" id="skill_desain_score" name="skill_desain_score" value="<?php echo htmlspecialchars($data['skill_desain_score']); ?>"><br>

        <input type="submit" value="Simpan Perubahan">
    </form>
</body>
</html>
