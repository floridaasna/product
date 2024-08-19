<?php
require_once "../modele/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$Spreadsheet =  new Spreadsheet();
$sheet = $Spreadsheet->getActiveSheet();
$sheet->setTitle('Feuille de calcul1');
$sheet->setCellValue("A1" , 'titre');
$sheet->setCellValue("A2" , 'valeur1');
$sheet->setCellValue("A3" , 'valeur2');
$sheet->setCellValue("B1" , 'description');
$sheet->setCellValue("B2" , 'description de la valeur');
$sheet->setCellValue("B3" , 'description de la valeur1');
$writer = new Xlsx($Spreadsheet);

?> 