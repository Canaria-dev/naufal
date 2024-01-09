<?php
// Load file koneksi.php
include "koneksi.php";
// Load file autoload.php
require 'vendor/autoload.php';
// Include library PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set style for header column
$style_col = [
    'font' => ['bold' => true],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
    ],
    'borders' => [
        'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
        'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
        'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
        'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
    ]
];

// Set style for data row
$style_row = [
    'alignment' => ['vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER],
    'borders' => [
        'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
        'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
        'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
        'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
    ]
];

// Query to retrieve data
$query = "SELECT * FROM naufal2";
$result = mysqli_query($koneksi, $query);

try {
    if (!$result) {
        throw new Exception('Error executing SQL query: ' . mysqli_error($koneksi));
    }

    // Set sheet title and headers
    $sheet->setCellValue('A1', "DATA ALUMNI")->mergeCells('A1:G1')->getStyle('A1')->getFont()->setBold(true);
    $sheet->setCellValue('A2', 'Data Alumni')->mergeCells('A2:G2')->getStyle('A2')->getFont()->setBold(true);

    // ...

    $headers = ["NIM", "Nama", "Jenis Kelamin", "Asal Kota", "Fakultas", "Prodi"]; // Remove "Foto" from the headers

    foreach ($headers as $col => $header) {
        $sheet->setCellValueByColumnAndRow($col + 1, 4, $header);
        $sheet->getCellByColumnAndRow($col + 1, 4)->getStyle()->applyFromArray($style_col);
    }

    // ...

    // Fill data
    $row = 5;
    while ($data = mysqli_fetch_array($result)) {
        $sheet->setCellValue('A' . $row, $data['nim'])
            ->setCellValue('B' . $row, $data['nama'])
            ->setCellValue('C' . $row, $data['jenis_kelamin'])
            ->setCellValue('D' . $row, $data['asal_kota'])
            ->setCellValue('E' . $row, $data['fakultas'])
            ->setCellValue('F' . $row, $data['prodi']);

        // Apply style to the entire row
        $sheet->getStyle('A' . $row . ':F' . $row)->applyFromArray($style_row);
        $row++;
    }

    // ...


    // Set column widths and orientation
    $columns = ['A' => 15, 'B' => 18, 'C' => 25, 'D' => 20, 'E' => 20, 'F' => 20];
    foreach ($columns as $column => $width) {
        $sheet->getColumnDimension($column)->setWidth($width);
    }

    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    // Set file headers
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Alumni.xlsx"');
    header('Cache-Control: max-age=0');

    // Save and output the spreadsheet
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
} catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
