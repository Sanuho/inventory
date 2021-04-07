<?php
error_reporting(E_ALL ^ E_NOTICE);
include "../config/koneksi.php";
if(@$_POST["action"] <> "")
 {
  $kode=@$_POST["action"];
  $output = '';
$sql=mysqli_query($koneksi,"
SELECT id_sub,qty,rec_h,(SELECT b.item_nm FROM item b WHERE b.item_cd=a.itm_cd) AS item_nm
FROM incoming_d a WHERE rec_h='$kode'
  ORDER BY id_sub");
  while($data=mysqli_fetch_array($sql)){
    $recH=$data['rec_h'];
    $output .= '
      <tr> 
      <td>'.$data["id_sub"].'</td>
      <td>'.$data["item_nm"].'</td>
      <td>'.$data["qty"].'</td>
      <td><a href="#" onclick="ConfirmDelete('.$data['id_sub'].')">
      <button href data-toggle="tooltip" data-placement="left" title="Delete Data" class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-close"></i></button></a>
      </td>
    </tr>';
  }
  
   //$output .= '</tbody></table></div></div>';
  
}

echo $output;
?>
