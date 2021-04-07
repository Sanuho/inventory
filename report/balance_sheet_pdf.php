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
$this->Cell(20,0.7,"Balance Sheet",0,0,'L');
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
//$pdf->Cell(1.5, 0.7,'Item Code', 1, 0, 'C');
$pdf->Cell(4.5, 0.7,'Item Name', 1, 0, 'C');
$pdf->Cell(1.5, 0.7,'Status', 1, 0, 'C');
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
t1.itm_cd,
item.item_nm,
'Balance' Stock,
(cur_stock+incoming_qty)-request_qty QTY,
DATE
FROM 	
(SELECT MAX(grgi_no) grgi_no, itm_cd FROM grgi_history GROUP BY itm_cd) t1,
grgi_history grgi
,item
WHERE
t1.grgi_no=grgi.grgi_no
AND t1.itm_cd=item.item_cd
UNION ALL
SELECT 
itm_cd,
item.item_nm,
'GR' Stock,
SUM(incoming_qty) QTY,
DATE
FROM grgi_history,
item
WHERE grgi_history.itm_cd=item.item_cd
GROUP BY
itm_cd,
item.item_nm,
DATE
UNION ALL
SELECT 
itm_cd,
item.item_nm,
'GI' Stock,
SUM(request_qty) QTY,
DATE
FROM grgi_history,
item
WHERE grgi_history.itm_cd=item.item_cd
GROUP BY
itm_cd,
item.item_nm,
DATE
ORDER BY 
ITM_CD,STOCK");
while ($r = mysqli_fetch_array($result)) {
//$pdf->Cell(1.5, 0.7,$r['itm_cd'] , 1, 0, 'C');	
$pdf->Cell(4.5, 0.7,$r['item_nm'] , 1, 0, 'L');
$pdf->Cell(1.5, 0.7,$r['Stock'] , 1, 0, 'L');	

$tglF=$_POST['dateF'];
$tglT=$_POST['dateT'];
$stock=$r['Stock'];
$itm=$r['itm_cd'];
$begin = new DateTime( $tglF );
$end = new DateTime( $tglT );
$end = $end->modify( '+1 day' ); 
$interval = new DateInterval('P1D');
$daterange = new DatePeriod($begin, $interval ,$end);
foreach($daterange as $date){
$tangs=$date->format("Y-m-d");

$qty=mysqli_query($koneksi,"SELECT * FROM
(SELECT 
t1.itm_cd,
item.item_nm,
'Balance' Stock,
(cur_stock+incoming_qty)-request_qty QTY
FROM 	
(SELECT MAX(grgi_no) grgi_no, itm_cd FROM grgi_history GROUP BY itm_cd) t1,
grgi_history grgi
,item
WHERE
t1.grgi_no=grgi.grgi_no
AND t1.itm_cd=item.item_cd
AND DATE='$tangs'
UNION ALL
SELECT 
itm_cd,
item.item_nm,
'GR' Stock,
SUM(incoming_qty) QTY
FROM grgi_history,
item
WHERE grgi_history.itm_cd=item.item_cd
AND DATE='$tangs'
GROUP BY
itm_cd,
item.item_nm
UNION ALL
SELECT 
itm_cd,
item.item_nm,
'GI' Stock,
SUM(request_qty) QTY
FROM grgi_history,
item
WHERE grgi_history.itm_cd=item.item_cd
AND DATE='$tangs'
GROUP BY
itm_cd,
item.item_nm
ORDER BY 
ITM_CD,STOCK)t1
WHERE 
t1.itm_cd='$itm'
AND t1.Stock='$stock'
UNION ALL
SELECT 
'' item_cd,
'' item_nm,
'' Stock,
'0' QTY
FROM DUAL
WHERE NOT EXISTS(
SELECT * FROM
(SELECT 
t1.itm_cd,
item.item_nm,
'Balance' Stock,
(cur_stock+incoming_qty)-request_qty QTY
FROM 	
(SELECT MAX(grgi_no) grgi_no, itm_cd FROM grgi_history GROUP BY itm_cd) t1,
grgi_history grgi
,item
WHERE
t1.grgi_no=grgi.grgi_no
AND t1.itm_cd=item.item_cd
AND DATE='$tangs'
UNION ALL
SELECT 
itm_cd,
item.item_nm,
'GR' Stock,
SUM(incoming_qty) QTY
FROM grgi_history,
item
WHERE grgi_history.itm_cd=item.item_cd
AND DATE='$tangs'
GROUP BY
itm_cd,
item.item_nm
UNION ALL
SELECT 
itm_cd,
item.item_nm,
'GI' Stock,
SUM(request_qty) QTY
FROM grgi_history,
item
WHERE grgi_history.itm_cd=item.item_cd
AND DATE='$tangs'
GROUP BY
itm_cd,
item.item_nm
ORDER BY 
ITM_CD,STOCK)t1
WHERE 
t1.itm_cd='$itm'
AND t1.Stock='$stock'
)
");
while($data = mysqli_fetch_array($qty)){
$pdf->Cell(1, 0.7,$data['QTY'] , 1, 0, 'C');	
}
}
$pdf->ln(0.7);
}

$pdf->ln(1);
$tgl=date('dmy');
$pdf->Output('balance-Sheet'.$kode.'-'.$tgl.'.pdf',"I");

?>