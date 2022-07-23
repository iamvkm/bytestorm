<?php

//call the FPDF library
require('fpdf/fpdf.php');

//create pdf object
$pdf = new FPDF('P', 'mm', 'A4');

//add new page
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

//Connect to your database
include("dbconn.php");

$qry = "SELECT name, address, phone, pincode FROM `details` ORDER BY pincode;";

foreach ($conn->query($qry) as $row) {

    $pdf->Cell(40, 10, 'Name:', 0, 0);
    $pdf->Cell(100, 10, $row["name"], 0, 1);

    $pdf->Cell(40, 10, 'Address:', 0, 0);
    $pdf->MultiCell(130, 10, $row["address"], 0, 1);

    $pdf->Cell(40, 10, 'Pincode:', 0, 0);
    $pdf->Cell(50, 10, $row["pincode"], 0, 1);

    $pdf->Cell(40, 10, 'Phone:', 0, 0);
    $pdf->Cell(50, 10, $row["phone"], 0, 1);

    $pdf->Cell(40, 10, '======================================================================================', 0, 1);
}

$pdf->Output();
