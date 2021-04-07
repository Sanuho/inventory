<?php
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));
include '../config/koneksi.php';
$kode=$_GET['kode'];
include '../js/pdf/fpdf.php';
class PDF extends FPDF
{
    private $kode;
// Page header
    function Header()
    {
$this->line(0.5,0.5,0.5,14.2); 
$this->line(0.5,0.5,20.5,0.5);   
$this->line(20.5,0.5,20.5,14.2);    
$this->line(20.5,14.2,0.5,14.2);
      include '../config/koneksi.php';
        // Logo
//$this->Image('assets\pdf\logo.png',10,6,30);
$kode=$_GET['kode'];
$this->SetFont('Arial','IUB',13);
$date=date('d-M-Y');
$this->Cell(15,0.7,"Request Form",0,0,'L');
$this->SetFont('Arial','',10);
$this->Cell(23,0.7,"Print date :  ".$date,0,10,'L');
$this->ln(0.5);

 $results=mysqli_query($koneksi,"SELECT * FROM request_h WHERE req_h='$kode'");
$no=1;
while($rows = mysqli_fetch_array($results)){

$this->ln(0.1);
$this->SetFont('Arial','I',11);
$this->Cell(4, 0.7,'Request No', 0, 0, 'L');
$this->Cell(8, 0.7,": ".$rows['req_h'], 0, 0, 'L');

$this->Cell(3, 0.7,'User', 0, 0, 'L');
$this->Cell(1, 0.7,' : ', 0, 0, 'L');
$this->Cell(3, 0.7,$rows['user'], 0, 1, 'R');

$this->Cell(4, 0.7,'Request Date', 0, 0, 'L');
$this->Cell(8, 0.7,": ".$rows['date'], 0, 0, 'L');

$this->Cell(3, 0.7,'Request Time', 0, 0, 'L');
$this->Cell(1, 0.7,' : ', 0, 0, 'L');
$this->Cell(3, 0.7,$rows['time'], 0, 1, 'R');

$this->ln(1);
    }
  }
    // Page footer
    function Footer()
{
//Position at 1.5 cm from bottom
$this->ln(0.1);
$this->Cell(10.2,0.5,"",0,0,'L');       
$this->Cell(3,0.5,"Approve",1,0,'C');
$this->Cell(3,0.5,"Check",1,0,'C');
$this->Cell(3,0.5,"Create",1,0,'C');
$this->ln(0.5);
$this->Cell(10.2,0.5,"",0,0,'L');       
$this->Cell(3,1.5,"       ",1,0,'C');
$this->Cell(3,1.5,"       ",1,0,'C');
$this->Cell(3,1.5,"       ",1,1,'C');
//$this->ln(0.5);
$this->Cell(0,1,'Page '.$this->PageNo().'/{nb}',0,1,'C');
}}

ob_end_clean();
ob_start();
$pdf = new PDF("L","cm","A5");
$pdf->SetMargins(1,1.5,1.5,1.5);
$pdf->AliasNbPages();
$pdf->AddPage();    
include '../config/koneksi.php';
$kode=$_GET['kode'];

// Detail
$pdf->SetFont('Arial','B',7);
$pdf->Cell(3,0.5,"No",1,0,'C');
$pdf->Cell(3,0.5,"Item Code",1,0,'C');
$pdf->Cell(5,0.5,"Item Name",1,0,'C');
$pdf->Cell(3,0.5,"Qty",1,0,'C');
$pdf->Cell(5,0.5,"Note",1,1,'C');


$pdf->SetFont('Arial',null,7);
$result=mysqli_query($koneksi,"SELECT rd.itm_cd,item.item_nm,rd.qty,rd.req_no,emp.nama_karyawan FROM 
 	request_d rd,
 	item,
 	karyawan emp
 	WHERE rd.itm_cd=item.item_cd 
 	AND emp.id=rd.remark
 	AND req_h='$kode'");
while($r = mysqli_fetch_array($result)) {
$pdf->Cell(3, 0.7,$r['req_no'] , 1, 0, 'C');
$pdf->Cell(3, 0.7,$r['itm_cd'], 1, 0, 'C');
$pdf->Cell(5, 0.7,$r['item_nm'], 1, 0, 'C');
$pdf->Cell(3, 0.7,$r['qty'], 1, 0, 'C');
$pdf->Cell(5, 0.7,$r['nama_karyawan'], 1, 1, 'C');
}
$pdf->ln(1);

$pdf->ln(0.1);
$tgl=date('dmy');
$pdf->Output('Request-Sheet'.$kode.'-'.$tgl.'.pdf',"I");

?>