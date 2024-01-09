<?php
include "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $asal_kota = $_POST['asal_kota'];
    $fakultas = $_POST['fakultas'];
    $prodi = $_POST['prodi'];
    $keterangan = $_POST['keterangan'];

    // File handling
    $foto = $_FILES['foto']['name'];
    $tmp_file = $_FILES['foto']['tmp_name'];

    // Move uploaded file to the "foto" directory
    $path = "foto/" . $foto;

    if (move_uploaded_file($tmp_file, $path)) {
        // Update database
        $sqlstr = "INSERT INTO naufal3 (nim, nama, jenis_kelamin, asal_kota, fakultas, prodi, keterangan, foto) VALUES ('$nim', '$nama', '$jenis_kelamin', '$asal_kota','$fakultas','$prodi','$keterangan','$foto')";
        

        if (mysqli_query($koneksi, $sqlstr)) {
            header('location:do.php');
        } else {
            echo "Error updating record: " . mysqli_error($koneksi);
        }
    } else {
        echo "Error moving file to the 'foto' directory.";
    }
}
?>