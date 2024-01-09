<?php
$host 				= "localhost";
$username_database 	= "root";
$password_database 	= "";
$nama_database		= "ahmad";

$koneksi = mysqli_connect($host, $username_database, $password_database, $nama_database);

// mengecek koneksi
if (!$koneksi) 
{
	die("Koneksi gagal: " . mysqli_connect_error());
}
mysqli_set_charset($koneksi, "utf8");

?>