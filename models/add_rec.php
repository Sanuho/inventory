<?php
include "../config/koneksi.php";

$user=@$_POST['user'];
// $user="admin";
$y=date('Y');
$m=date('m');
$sql=mysqli_query($koneksi,"SELECT MAX(MID(rec_h,3)) as maks FROM incoming_h a WHERE YEAR(a.date_create)='".$y."' AND MONTH(a.date_create)='".$m."' ");
$cek=mysqli_num_rows($sql);

$y=date('y');
if($cek>0){
    $data=mysqli_fetch_array($sql);
    $maks=$data[0];
    $nomer=(int)substr($maks,4,5);
    if (strlen($nomer)==4) {
        $series=$nomer + 1;
    }elseif (strlen($nomer)==3) {
        $series="0".($nomer + 1);
    }elseif (strlen($nomer)==2) {
        $series="00".($nomer + 1);
    }elseif (strlen($nomer)==1) {
        $series="000".($nomer + 1);
    }elseif (strlen($nomer)==3) {
        $series="0001";
    }
    $noTrans="IH".$y.$m.$series;
}else{
    $noTrans="IH".$y.$m."0001";
}
$query=mysqli_query($koneksi,"SELECT * from incoming_h where user='$user' and flag=0");
$cek=mysqli_num_rows($query);
if ($cek>0) {
    echo "<script>
        alert('There is still unused data'+'".$noTrans."');
        window.location.href='../index.php?page=receive';
    </script>";
}else{
    $sql=mysqli_query($koneksi,"INSERT INTO incoming_h (rec_h,date_create,user,flag) values ('".$noTrans."','".date('Y-m-d H:i:s')."','".$user."',0)");
    echo "<script>
        alert('Success Add');
        window.location.href='../index.php?page=receive';
    </script>";
}
// echo $noTrans;

// header("location: index.php?page=request");
?>