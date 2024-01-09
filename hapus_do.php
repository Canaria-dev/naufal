<?php
include "koneksi.php";

$Kode = $_GET['kode'];
mysqli_query($koneksi, "delete from naufal3 where nim='$Kode'");
header('location:do.php');
?>