<?php
require('fpdf/fpdf.php');  //pastikan path atau alamat FPDF sesuai
$pd = require_once('cetak.php');  //pastikan path atau alamat FPDF sesuai
$pdf = new FPDF();
$pdf->AddPage();  //membuat halaman baru
$pdf->SetFont('Arial','B',16);  //memilih font Arial Bold dengan ukuran 16pt
$pdf->Cell(40,10,$pd); //membuat sebuah cell dengan panjang 40 dan tinggi 10
                                             //yang berisi tulisan 'Selamat Datang di FPDF'

$pdf->Output();  //hasilnya dicetak
?>