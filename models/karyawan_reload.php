<?php
include "../config/koneksi.php";
include "../config/koneksi_sql.php";
if (isset($_POST['add'])) {
$delete = mysqlI_query($koneksi,"DELETE FROM t_karyawan WHERE flag=1");

$sql = "SELECT * FROM [SPISy_TMISC].[dbo].[VDataSPISy] WHERE  (ResignType is null or ResignType = '')";
$stmt = sqlsrv_query($conn,$sql);
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
$insert = mysqlI_query($koneksi,"INSERT INTO karyawan (id, nik , nama_karyawan, dept, flag)VALUES('".$row['NoPegawai']."','".$row['NIK']."','".$row['Nama']."','".$row['BAGIAN']."',1)");
}
if($insert){

 echo "<script type=\"text/javascript\">
              alert(\"Employee data exported!!\");
              window.location = \"../index.php?page=karyawan\"
              </script>";
}else{

	echo "<script type=\"text/javascript\">
              alert(\"Data Already Updated!!\");
              window.location = \"../index.php?page=karyawan\"
              </script>";
}



}

?>