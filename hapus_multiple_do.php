<?php
include('koneksi.php');

if (isset($_GET['selectedData'])) {
    $selectedData = explode(',', $_GET['selectedData']);
    
    // Hapus data berdasarkan nim yang dipilih
    foreach ($selectedData as $nim) {
        $nim = mysqli_real_escape_string($koneksi, $nim);
        $queryDelete = "DELETE FROM naufal3 WHERE nim = '$nim'";
        mysqli_query($koneksi, $queryDelete);
    }

    // Redirect kembali ke halaman kelahiran
    header("Location: do.php");
    exit();
} else {
    // Jika tidak ada data yang dipilih, kembali ke halaman kelahiran
    header("Location: do.php");
    exit();
}
?>
