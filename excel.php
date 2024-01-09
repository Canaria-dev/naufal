<?php
// Load file koneksi.php
include "koneksi.php";
// Load file autoload.php
require 'vendor/autoload.php';
// Include library PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\IOFactory;

try {
    // Get uploaded file
    $uploadedFile = $_FILES['excel_file']['tmp_name'];

    // Load the Excel file
    $spreadsheet = IOFactory::load($uploadedFile);
    $sheet = $spreadsheet->getActiveSheet();

    // Get highest row and column numbers
    $highestRow = $sheet->getHighestDataRow();
    $highestColumn = $sheet->getHighestDataColumn();
    $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

    // Loop through each row in the Excel file starting from row 5 (assuming the data starts from row 5)
    for ($row = 5; $row <= $highestRow; $row++) {
        // Retrieve data from each column
        $nim = $sheet->getCellByColumnAndRow(1, $row)->getValue();
        $nama = $sheet->getCellByColumnAndRow(2, $row)->getValue();
        $jenisKelamin = $sheet->getCellByColumnAndRow(3, $row)->getValue();
        $asalKota = $sheet->getCellByColumnAndRow(4, $row)->getValue();
        $fakultas = $sheet->getCellByColumnAndRow(5, $row)->getValue();
        $prodi = $sheet->getCellByColumnAndRow(6, $row)->getValue();

        // Insert data into the database
        $query = "INSERT INTO naufal2 (nim, nama, jenis_kelamin, asal_kota, fakultas, prodi) 
                  VALUES ('$nim', '$nama', '$jenisKelamin', '$asalKota', '$fakultas', '$prodi')";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            throw new Exception('Error executing SQL query: ' . mysqli_error($koneksi));
        }
    }

    echo 'Data imported successfully!';
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
?>
