<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
//$this->Image('assets\pdf\logo.png',10,6,30);

$this->SetFont('Arial','IUB',13);
$this->Cell(25.5,0.7,"GI ORDER SHEET",0,10,'L');
$this->ln(0.5);

    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-6);

        // Arial italic 8
        $this->SetFont('Arial','I',8);

        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

?>