<?php
include "../config/koneksi.php";

$id=$_GET['id']; 

$rec=mysqli_query($koneksi,"SELECT * FROM incoming_d where id_sub='$id'");
$getrec=mysqli_fetch_array($rec);
$itm=$getrec['itm_cd'];
$qty=$getrec['qty'];
$req=$getrec['rec_h']; 
$stock=mysqli_query($koneksi,"SELECT * FROM item where item_cd='$itm'");
$getqty=mysqli_fetch_array($stock);
$plus=$getqty['qty']-$qty;
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
$minqty=$qty*-1;
$reqty=$getqty['qty'];
$waktu=gmdate("H:i:s", time()+60*60*7);
$tanggal=date('Y-m-d');
$grgi=mysqli_query($koneksi, "INSERT INTO grgi_history values('$hasilkode1','$itm','$plus','$tanggal','$waktu',$minqty,0,'$req','$id')"); 


//$gg=mysqli_query($koneksi,"DELETE from grgi_history where detail='$id'");
$query=mysqli_query($koneksi,"DELETE from incoming_d where id_sub='$id'");
if ($query) {
	
  echo "<script type=\"text/javascript\">
              alert(\"Data Deleted!!\");
              window.location = \"../index.php?page=rec_edit&id=".$req."\"
              </script>";

}	else{
  echo "<script type=\"text/javascript\">
              alert(\"Delete Failed!!\");
              window.location = \"../index.php?page=rec_edit&id=".$req."\"
              </script>";
}

?>