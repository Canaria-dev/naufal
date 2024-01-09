<?php ob_start(); ?>
<html>
<head>
  <title>Cetak PDF</title>
   <style>
   table {border-collapse: collapse; table-layout: fixed; width: 620px;}
   table td {word-wrap: break-word; width: 10%;}
   img {max-width: 50px; max-height: 50px;}
   </style>
</head>
<body>

<img src="foto/logo.jpg" alt="">
  
<h1 style="text-align: center;">Data Alumni </h1>
<table border="1" width="100%">
<tr>
  <th>Foto</th>  
  <th>NIM</th>
  <th>Nama</th>
  <th>Jenis Kelamin</th>
  <th>Asal Kota</th>
  <th>Fakultas</th>
  <th>Prodi</th>
</tr>
<?php

include "koneksi.php";
 
$query = "SELECT * FROM naufal2"; 
$sql = mysqli_query($koneksi, $query); 
$row = mysqli_num_rows($sql); 
 
if($row > 0){ 
    while($data = mysqli_fetch_array($sql)){ 
        echo "<tr>";
        echo "<td><img src='foto/" . $data['foto'] . "' alt='Foto'></td>";
        echo "<td>".$data['nim']."</td>";
        echo "<td>".$data['nama']."</td>";
        echo "<td>".$data['jenis_kelamin']."</td>";
        echo "<td>".$data['asal_kota']."</td>";
        echo "<td>".$data['fakultas']."</td>";
        echo "<td>".$data['prodi']."</td>";
        echo "</tr>";
    }
} else { 
    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require 'html2pdf/autoload.php';
$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Alumni.pdf', 'D');
?>
