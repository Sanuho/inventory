<?php

error_reporting(E_ALL ^ E_NOTICE);
include "../config/koneksi.php";
if(@$_POST["action"] <> "")
 {

  $kode=@$_POST["action"];
  $output = '';
 
$sql=mysqli_query($koneksi,"
SELECT id_sub,qty,req_h,(SELECT b.item_nm FROM item b WHERE b.item_cd=a.itm_cd) AS item_nm,
(SELECT c.nama_karyawan FROM karyawan c WHERE c.nik=a.remark) AS nama_karyawan
 FROM request_d a WHERE req_h='$kode'
  ORDER BY a.id_sub");
while($data=mysqli_fetch_array($sql)){
  $output .= '
   <tr> 
    <td>'.$data["id_sub"].'</td>
    <td>'.$data["item_nm"].'</td>
    <td>'.$data["qty"].'</td>
    <td>'.$data["nama_karyawan"].'</td>
    
    <td><a href="#" onclick="ConfirmDelete('.$data['id_sub'].','.$data['req_h'].')">
    <button href data-toggle="tooltip" data-placement="left" title="Delete Data" class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-close"></i></button></a>
    </td>
   </tr>';}
  
   //$output .= '</tbody></table></div></div>';
 
}
echo $output;
