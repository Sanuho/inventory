<?php
include "../config/koneksi.php";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = mysqli_query($koneksi, "UPDATE incoming_h set flag=1 where rec_h='$id'");
  //$insert=mysqli_query($koneksi,"INSERT INTO ");
  if ($query) {

    echo "<script type=\"text/javascript\">
                alert(\"Data Approved!!\");
                window.location = \"../index.php?page=request\"
                </script>";
  } else {
    echo "<script type=\"text/javascript\">
                alert(\"Failed!!\");
                window.location = \"../index.php?page=request\"
                </script>";
  }
} elseif (isset($_GET['kode'])) {
  $kode = $_GET['kode'];

  $query = mysqli_query($koneksi, "UPDATE incoming_h set flag=0 where rec_h='$kode'");
  if ($query) {

    echo "<script type=\"text/javascript\">
              alert(\"Unapproved Complete!!\");
              window.location = \"../index.php?page=request\"
              </script>";
  } else {
    echo "<script type=\"text/javascript\">
              alert(\"Failed!!\");
              window.location = \"../index.php?page=request\"
              </script>";
  }
}
