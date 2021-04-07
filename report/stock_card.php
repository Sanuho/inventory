<?php
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));
include '../config/koneksi.php';
$kode=$_GET['kode'];
include '../assets/js/pdf/fpdf.php';
class PDF extends FPDF
{
    private $kode;
// Page header
    function Header()
    {
$this->line(0.5,0.5,0.5,20.5); 
$this->line(0.5,0.5,14.4,0.5); 
$this->line(0.5,2.3,14.4,2.3);   
$this->line(14.4,0.5,14.4,20.5);    
$this->line(14.4,20.5,0.5,20.5);
include '../config/koneksi.php';
// Logo
//$this->Image('assets\pdf\logo.png',10,6,30);
$kode=$_GET['kode'];
$this->SetFont('Arial','IUB',13);
$date=date('d-M-Y');
$this->Cell(15,0.7,"Stock Card Form",0,0,'L');
$this->Image('../assets/images/logo.png',9,0.8,-500);
$this->SetFont('Arial','',10);
$this->Cell(23,0.7,"Print date :  ".$date,0,10,'L');
$this->ln(0.6);

$result=mysqli_query($koneksi,"SELECT item.*,category.name,unit.unit_nm,dept.dept_nm
	FROM item,unit,category,dept 
	WHERE category.id=item.id 
	AND unit.unit_cd=item.unit_cd 
	AND dept.id_dept=item.id_dept  
	AND item.item_cd='$kode' ");
$rs = mysqli_fetch_array($result);


$this->SetFont('Arial','B',6);
$this->Cell(2,0.5,"Item Code",0,0,'L');
$this->Cell(2,0.5,": ".$rs['item_cd'],0,1,'L');
$this->Cell(2,0.5,"Item Name",0,0,'L');
$this->Cell(2,0.5,": ".$rs['item_nm'],0,1,'L');
$this->Cell(2,0.5,"Unit",0,0,'L');
$this->Cell(2,0.5,": ".$rs['unit_nm'],0,1,'L');
$this->Cell(2,0.5,"Min Order Point",0,0,'L');
$this->Cell(2,0.5,": ".$rs['min'],0,1,'L');
$this->Cell(2,0.5,"MAX Order Point",0,0,'L');
$this->Cell(2,0.5,": ".$rs['max'],0,1,'L');
$this->Cell(2,0.5,"Control Dept",0,0,'L');
$this->Cell(2,0.5,": ".$rs['dept_nm'],0,1,'L');
$this->ln(0.5);


$this->SetFont('Arial','B',7);
$this->Cell(2,0.5,"Date",1,0,'C');
$this->Cell(1.5,0.5,"Balance",1,0,'C');
$this->Cell(1.5,0.5,"IN",1,0,'C');
$this->Cell(1.5,0.5,"OUT",1,0,'C');
$this->Cell(2,0.5,"PIC",1,0,'C');
$this->Cell(4,0.5,"Usage",1,1,'C');
  }
    // Page footer
    function Footer()
{
//Position at 1.5 cm from bottom

$this->Cell(0,0.1,'Page '.$this->PageNo().'/{nb}',0,1,'C');
}}

ob_end_clean();
ob_start();
$pdf = new PDF("P","cm","A5");
$pdf->SetMargins(1,1,1.5,1.5);
$pdf->AliasNbPages();
$pdf->AddPage();    
include '../config/koneksi.php';
$kode=$_GET['kode'];

// Detail

$pdf->SetFont('Arial',null,7);
$result=mysqli_query($koneksi,"SELECT
grgi.itm_cd,
item.item_nm,
t1.cur_stock,
SUM(grgi.request_qty) GI,
SUM(grgi.incoming_qty) GR,
grgi.DATE
FROM
(SELECT itm_cd,cur_stock, DATE FROM grgi_history WHERE grgi_no IN(SELECT MAX(grgi_no) grgi_no FROM grgi_history GROUP BY itm_cd )) t1,
grgi_history grgi,
item
WHERE
t1.itm_cd=grgi.itm_cd
AND grgi.itm_cd=item.item_cd
AND grgi.itm_cd='$kode'
GROUP BY
grgi.itm_cd,
item.item_nm,
grgi.DATE,
t1.cur_stock");
while($r = mysqli_fetch_array($result)) {
$tanggal=date('d-M-Y',strtotime($r['DATE']));
$pdf->Cell(2, 0.7,$tanggal, 1, 0, 'C');
$pdf->Cell(1.5, 0.7,$r['cur_stock'], 1, 0, 'C');
$pdf->Cell(1.5, 0.7,$r['GR'], 1, 0, 'C');
$pdf->Cell(1.5, 0.7,$r['GI'], 1, 0, 'C');
$pdf->Cell(2, 0.7,"", 1, 0, 'C');
$pdf->Cell(4, 0.7,"", 1, 1, 'C');

}
$pdf->ln(1);

$pdf->ln(0.1);
$tgl=date('dmy');
$pdf->Output('Request-Sheet'.$kode.'-'.$tgl.'.pdf',"I");

?>