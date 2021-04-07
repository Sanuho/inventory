<?php
//@session_start();
$dept = @$_SESSION['wh'];
?>
<div class="form-element-area">
    <div class="container">
        <div class="row animated    ">

            <div class="breadcomb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcomb-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcomb-wp">
                                            <div class="breadcomb-icon">
                                                <i class="notika-icon notika-app"></i>
                                            </div>
                                            <div class="breadcomb-ctn">
                                                <h2>Item List</h2>
                                                <p>Register <span class="bread-ntd">Item Here!!</span></p>
                                                <form action="index.php?page=item" method="POST">
                                                    <table>
                                                        <th>
                                                            <button type="submit" name="add" class="btn btn-success">
                                                                New <i class="fa fa-plus-square"></i></button>
                                                        </th>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start Status area -->
            <div class="notika-status-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php if ($dept == @$_SESSION['dept']) { ?>
                                        <form action="index.php?page=item" method="POST">
                                            <table>
                                                <th>
                                                    <button type="submit" name="add" class="btn btn-success">
                                                        New <i class="fa fa-plus-square"></i></button>
                                                </th>
                                            </table>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Status area-->

            <!-- Data Table area Start-->
            <div class="data-table-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="data-table-list">
                                <div class="table-responsive">
                                    <table id="data-table-basic" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Item Code</th>
                                                <th>Item Name</th>
                                                <th>Category</th>
                                                <th>Current Stock</th>
                                                <th>Item Control Dept</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($koneksi, "SELECT * FROM item, dept WHERE item.id_dept=dept.id_dept ");
                                            while ($data = mysqli_fetch_array($sql)) {
                                                if ($data['stat'] == 1) {
                                                    $stat = "Actived";
                                                    $warna = "btn-success";
                                                    $btn="
                                                    <button href data-toggle='tooltip' data-placement='left' title='Disable Item' class='btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg'>
                                                        <i class='notika-icon notika-close'></i>
                                                    </button>";
                                                } else {
                                                    $stat = "Expired";
                                                    $warna = "btn-danger";
                                                    $btn="
                                                    <button href data-toggle='tooltip' data-placement='left' title='Activate Item' class='btn btn-primary success-icon-notika btn-reco-mg btn-button-mg'>
                                                        <i class='notika-icon notika-checked'></i>
                                                    </button>";
                                                }
                                            ?>
                                                <tr>
                                                    <td><?php echo $data['item_cd']; ?></td>
                                                    <td><?php echo $data['item_nm']; ?></td>
                                                    <td><?php echo $data['id']; ?></td>
                                                    <td><?php echo $data['qty']; ?></td>
                                                    <td><?php echo $data['dept_nm']; ?></td>
                                                    <td><span class="btn <?= $warna ?> btn-reco-mg btn-button-mg""><?= $stat ?></span></td>
                                                    <td>
                                                        <a href="index.php?page=item_edit&id=<?php echo $data['item_cd']; ?>" onclick="return confirm('edit data?')">
                                                            <button data-toggle="tooltip" data-placement="left" title="Edit Data" class="btn btn-lime lime-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-menus"></i></button></a>
                                                        &nbsp;
                                                        <a href="models/disable_item.php?action=<?= $data['stat'] ?>&id=<?= $data['item_cd']; ?>" onclick="return confirm('Are you sure?')">
                                                            <?=$btn?>
                                                        </a>

                                                        &nbsp;
                                                        <a href="report/stock_card.php?kode=<?php echo $data['item_cd']; ?>" target="blank" onclick="return confirm('Print data?')">
                                                            <button href data-toggle="tooltip" data-placement="left" title="print Data" class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-sent"></i></button></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Item Code</th>
                                                <th>Item Name</th>
                                                <th>Category</th>
                                                <th>Current Stock</th>
                                                <th>Item Control Dept</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Table area End-->
        </div>
    </div>
</div>