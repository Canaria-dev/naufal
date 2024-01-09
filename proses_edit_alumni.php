<?php
include "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim_lama = $_POST['nim_lama'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $asal_kota = $_POST['asal_kota'];
    $fakultas = $_POST['fakultas'];
    $prodi = $_POST['prodi'];

    // File handling
    $foto = $_FILES['foto']['name'];
    $tmp_file = $_FILES['foto']['tmp_name'];

    // Move uploaded file to the "foto" directory
    $path = "foto/" . $foto;

    if (move_uploaded_file($tmp_file, $path)) {
        // Update database
        if ($nim == "") {
            $sqlstr = "UPDATE `naufal2` SET `nama`='$nama', `jenis_kelamin`='$jenis_kelamin', `asal_kota`='$asal_kota', `fakultas`='$fakultas', `prodi`='$prodi', `foto`='$foto' WHERE `naufal2`.`nim`='$nim_lama'";
        } else {
            $sqlstr = "UPDATE `naufal2` SET `nim`='$nim', `nama`='$nama', `jenis_kelamin`='$jenis_kelamin', `asal_kota`='$asal_kota', `fakultas`='$fakultas', `prodi`='$prodi', `foto`='$foto' WHERE `naufal2`.`nim`='$nim_lama'";
        }

        if (mysqli_query($koneksi, $sqlstr)) {
            header('location: alumni.php');
        } else {
            echo "Error updating record: " . mysqli_error($koneksi);
        }
    } else {
        echo "Error moving file to the 'foto' directory.";
    }
}
?>