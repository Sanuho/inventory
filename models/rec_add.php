<?php
include "../config/koneksi.php";

$id_h        = $_POST['id'];
$qty         = $_POST['qty'];
$itm         = $_POST['category'];
$reqd        = $_POST['reqd'];
$numberberat = $_POST["qty"];
// $update = mysqli_query($koneksi,"update t_makan_h set shift='".$_POST["Shift"]."', empl='".$_POST["emp"]."',vis='".$_POST["vis"]."',tot='".$_POST["total"]."' where indeks_h='".$_POST["indeks_h"]."'");

if($qty > 0)
{
$sql=mysqli_query($koneksi, "INSERT INTO incoming_d (id_h,itm_cd,qty,rec_h) values('$id_h','$itm','$qty','$reqd')");
$id_sub=mysqli_insert_id($koneksi);
$stock=mysqli_query($koneksi,"SELECT * FROM item where item_cd='$itm'");
$getqty=mysqli_fetch_array($stock);
$plus=$getqty['qty']+$qty;
mysqli_query($koneksi, "UPDATE item SET qty='$plus' WHERE item_cd='$itm'");


$bulan1=date('m');
$tahun1=date('Y');
$tahunAkhir1=substr($tahun1,2,2);
$tglkode1=$tahunAkhir1.$bulan1;
$carikode1=mysqli_query($koneksi,"SELECT max(grgi_no) from grgi_history");
$datakode1=mysqli_fetch_array($carikode1);
if($datakode1){
$nilaitahun1=substr($datakode1[0],2,2);
$nilaibulan1=substr($datakode1[0],4,2);
if($nilaitahun1<$tahunAkhir1){
  $nilaikode1="0000000";
}else{
$nilaikode1=substr($datakode1[0],6);
}
if($nilaibulan1<$bulan1){
$nilaikode1="0000000";
}else{
$nilaikode1=substr($datakode1[0],6);
}
$kode1=(int)$nilaikode1;
$kode1=$kode1+1;
$hasilkode1="GG".$tglkode1.str_pad($kode1,7,"0",STR_PAD_LEFT);
}else{
  $hasilkode1="GG".$tglkode1."0000001";
}
$reqty=$getqty['qty'];
$waktu=gmdate("H:i:s", time()+60*60*7);
$tanggal=date('Y-m-d');
$grgi=mysqli_query($koneksi, "INSERT INTO grgi_history values('$hasilkode1','$itm','$plus','$tanggal','$waktu',$qty,0,'$reqd','$id_sub')"); 







	echo "Data Inserted";
}
else
{
	echo "Isi Quantity nya zeyenk!!!!!";
}