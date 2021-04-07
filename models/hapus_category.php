<?php
include "../config/koneksi.php";

$id=$_GET['id'];
$query=mysqli_query($koneksi,"DELETE from category where id='$id'");
if ($query) {
	
  echo "<script type=\"text/javascript\">
              alert(\"Data Deleted!!\");
              window.location = \"../index.php?page=category_entry\"
              </script>";

}	else{
  echo "<script type=\"text/javascript\">
              alert(\"Delete Failed!!\");
              window.location = \"../index.php?page=category_entry\"
              </script>";
}

?>