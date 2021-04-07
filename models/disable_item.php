<?php
include "../config/koneksi.php";

$action=$_GET['action'];
$id=$_GET['id'];

if($action==1){
$query=mysqli_query($koneksi,"UPDATE item set item.stat = 2 where item_cd='$id'");
if ($query) {
	
  echo "<script type=\"text/javascript\">
              alert(\"Item Expire!!\");
              window.location = \"../index.php?page=item_list\"
              </script>";

}	else{
  echo "<script type=\"text/javascript\">
              alert(\"Expired Failed!!\");
              window.location = \"../index.php?page=item_list\"
              </script>";
}
}elseif($action == 2){
    $query=mysqli_query($koneksi,"UPDATE item set item.stat = 1 where item_cd='$id'");
    if ($query) {
        
      echo "<script type=\"text/javascript\">
                  alert(\"Item Activated!!\");
                  window.location = \"../index.php?page=item_list\"
                  </script>";
    
    }	else{
      echo "<script type=\"text/javascript\">
                  alert(\"Activate Failed!!\");
                  window.location = \"../index.php?page=item_list\"
                  </script>";
    }
}else{
    echo "<script type=\"text/javascript\">
    alert(\"Failed!!\");
    window.location = \"../index.php?page=item_list\"
    </script>";
}
