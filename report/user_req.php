<?php
error_reporting(E_ALL ^(E_NOTICE | E_WARNING));
include '../config/koneksi.php';
// $dateF=$_POST['dateF'];
// $dateT=$_POST['dateT'];
include '../js/pdf/fpdf.php';
class PDF extends FPDF
{
private $kode;
//Page header
function Header()
{
$this->line(0.5,0.5,0.5,20.5); 
$this->line(0.5,0.5,29,0.5);   
$this->line(29,0.5,29,20.5);    
$this->line(29,20.5,0.5,20.5);
include '../config/koneksi.php';
//Logo
//$this->Image('assets\pdf\logo.png',10,6,30);
$kode=$_GET['kode'];
$this->SetFont('Arial','IUB',13);
$date=date('d-M-Y');
$this->Cell(20,0.7,"Item Request By User",0,0,'L');
$this->SetFont('Arial','',10);
$this->Cell(23,0.7,"Print date :  ".$date,0,10,'L');
$this->ln(0.5);


  }
    // Page footer
    function Footer()
{
//Position at 1.5 cm from bottom

//$this->ln(0.5);
$this->Cell(0,1,'Page '.$this->PageNo().'/{nb}',0,1,'C');
}}

ob_end_clean();
ob_start();
$pdf = new PDF("L","cm","A4");
$pdf->SetMargins(1,1.5,1.5,1.5);
$pdf->AliasNbPages();
$pdf->AddPage();    
include '../config/koneksi.php';
$kode=$_GET['kode'];

// Detail
$pdf->SetFont('Arial','B',8);
// $pdf->Cell(4,0.5,"Nik",1,0,'C');
// $pdf->Cell(5,0.5,"Name",1,0,'C');
// $pdf->Cell(5,0.5,"Item",1,0,'C');
// $pdf->Cell(5,0.5,"Remark",1,1,'C');
$pdf->Cell(2, 0.7,'NIK', 1, 0, 'C');
$pdf->Cell(3, 0.7,'Nama Karyawan', 1, 0, 'C');
$tglF=$_POST['dateF'];
$tglT=$_POST['dateT'];
$begin = new DateTime( $tglF );
$end = new DateTime( $tglT );
$end = $end->modify( '+1 day' ); 
$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval ,$end);
foreach($daterange as $date){
	$pdf->SetFont('Arial',null,6);
	$tang=$date->format("d M");
$pdf->Cell(1, 0.7,$tang, 1, 0, 'C');
}
$pdf->ln(0.7);



$pdf->SetFont('Arial',null,7);
$result=mysqli_query($koneksi,"SELECT 
emp.nama_karyawan,
emp.id,
SUM(rd.qty) 
FROM
karyawan emp,
request_d rd,
request_h rh,
item
WHERE emp.id=rd.remark
AND rd.itm_cd=item.item_cd
AND rh.req_h=rd.req_h
GROUP BY
emp.nama_karyawan,
emp.id");
while ($r = mysqli_fetch_array($result)) {
$pdf->Cell(2, 0.7,$r['id'] , 1, 0, 'C');	
$pdf->Cell(3, 0.7,$r['nama_karyawan'] , 1, 0, 'C');	


// $tglF='22-07-2019';
// $tglT='23-07-2019';
$begin = new DateTime( $tglF );
$end = new DateTime( $tglT );
$end = $end->modify( '+1 day' ); 
$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval ,$end);
foreach($daterange as $date){
$tangs=$date->format("Y-m-d");
$nik=$r['id'];
$qty=mysqli_query($koneksi,"SELECT 
emp.nama_karyawan,
emp.id,
SUM(rd.qty) qty
FROM
karyawan emp,
request_d rd,
request_h rh,
item
WHERE emp.id=rd.remark
AND rd.itm_cd=item.item_cd
AND rh.req_h=rd.req_h
AND rh.date='$tangs'
AND emp.id='$nik'
GROUP BY
emp.nama_karyawan,
emp.id
UNION ALL
SELECT
''nama_karyawan,
''id,
'0' qty
FROM DUAL
WHERE NOT EXISTS(SELECT 
emp.nama_karyawan,
emp.id,
SUM(rd.qty) qty
FROM
karyawan emp,
request_d rd,
request_h rh,
item
WHERE emp.id=rd.remark
AND rd.itm_cd=item.item_cd
AND rh.req_h=rd.req_h
AND rh.date='$tangs'
AND emp.id='$nik'
GROUP BY
emp.nama_karyawan,
emp.id)
");
$data = mysqli_fetch_array($qty);
$pdf->Cell(1, 0.7,$data['qty'] , 1, 0, 'C');	
}
$pdf->ln(0.7);


}




$pdf->ln(1);
$tgl=date('dmy');
$pdf->Output('Request-Sheet'.$kode.'-'.$tgl.'.pdf',"I");

?>