<?php
include "../config/koneksi.php";

$id=$_GET['id'];
$query=mysqli_query($koneksi,"DELETE from item where item_cd='$id'");
if ($query) {
	
  echo "<script type=\"text/javascript\">
              alert(\"Data Deleted!!\");
              window.location = \"../index.php?page=item_list\"
              </script>";

}	else{
  echo "<script type=\"text/javascript\">
              alert(\"Delete Failed!!\");
              window.location = \"../index.php?page=item_list\"
              </script>";
}

?>