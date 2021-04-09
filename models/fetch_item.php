<?php

error_reporting(E_ALL ^ E_NOTICE);
include "../config/koneksi.php";
    // $kode = @$_POST["action"];
    $output = '';

    $sql = mysqli_query($koneksi, "SELECT * FROM item, dept WHERE item.id_dept=dept.id_dept  ");
    while ($data = mysqli_fetch_array($sql)) {
        if ($data['stat'] == 1) {
            $stat = "Actived";
            $warna = "btn-success";
            $btn = "<button href data-toggle='tooltip' data-placement='left' title='Disable Item' class='btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg'>
                                <i class='notika-icon notika-close'></i>
                            </button>";
        } else {
            $stat = "Expired";
            $warna = "btn-danger";
            $btn = "
                            <button href data-toggle='tooltip' data-placement='left' title='Activate Item' class='btn btn-primary success-icon-notika btn-reco-mg btn-button-mg'>
                                    <i class='notika-icon notika-checked'></i>
                            </button>";
        }
    ?>
       <tr>
            <td><?=$data['item_cd']?></td>
            <td><?=$data['item_nm']?></td>
            <td><?=$data['id']?></td>
            <td><?=$data['qty']?></td>
            <td><?=$data['dept_nm']?></td>
            <td><span class='btn <?=$warna?> btn-reco-mg btn-button-mg'><?= $stat ?></span></td>
                                                    
            <td>
                        <a href=' index.php?page=item_edit&id=<?=$data['item_cd']?>' onclick='return confirm("edit data?")'>
                    <button data-toggle='tooltip' data-placement='left' title='Edit Data' class='btn btn-lime lime-icon-notika btn-reco-mg btn-button-mg'><i class='notika-icon notika-menus'></i></button></a>
                    &nbsp;
                    <a href='#' onclick="ConfirmDelete('<?=$data['stat']?>','<?=$data['item_cd']?>')"><?=$btn?>
                    <!-- <a href="models/disable_item.php?action=<?=$data['stat']?>&id=<?=$data['item_cd']?>" onclick="return confirm('Are you sure?')" > -->
                    </a>

                    &nbsp;
                    <a href='report/stock_card.php?kode=<?=$data['item_cd']?>' target='blank' onclick="return confirm('Print data?')">
                    <button href data-toggle='tooltip data-placement='left' title='Print Data' class='btn btn-success success-icon-notika btn-reco-mg btn-button-mg'><i class='notika-icon notika-sent'></i></button></a>
            </td>
        </tr>";
        <?php
    }


// echo $output;

