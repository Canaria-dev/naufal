<?php
include "koneksi.php";

$Kode = $_GET['kode'];
mysqli_query($koneksi, "delete from naufal2 where nim='$Kode'");
header('location:alumni.php');
?>