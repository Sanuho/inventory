<div class="form-element-area">
    <div class="container">
        <div class="row animated zoomIn">
            <!-- Data Table area Start-->
            <div class="data-table-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <form action="models/add_req.php" method="POST">
                                <table>
                                    <th>
                                        <input type="hidden" name="user" value="<?=$_SESSION['nama']?>">
                                        <button type="submit" name="add" class="btn btn-success" onclick="return confirm('Add data?')">
                                            New <i class="fa fa-plus-square"></i></button>
                                    </th>
                                </table>
                            </form>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="data-table-list">
                                <div class="table-responsive">
                                    <table id="data-table-basic" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Request No</th>
                                                <th>Request Date</th>
                                                <th>Request User</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $wh = @$_SESSION['wh'];
                                            $sql = mysqli_query($koneksi, "SELECT * FROM request_h");
                                            while ($data = mysqli_fetch_array($sql)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $data['req_h']; ?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($data['date_create'])); ?></td>
                                                    <td><?php echo $data['user']; ?></td>
                                                    <?php if ($data['flag'] == 0) {
                                                    ?>
                                                        <td><a href="index.php?page=req_edit&id=<?php echo $data['req_h']; ?>" onclick="return confirm('edit data?')">
                                                                <button data-toggle="tooltip" data-placement="left" title="Edit Data" class="btn btn-lime lime-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-menus"></i></button></a>
                                                            &nbsp;
                                                            <a href="models/hapus_req_h.php?id=<?php echo $data['req_h']; ?>" onclick="return confirm('delete data?')">
                                                                <button href data-toggle="tooltip" data-placement="left" title="Delete Data" class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-close"></i></button></a>
                                                            &nbsp;
                                                            <?php if (@$_SESSION['level'] == 'admin') { ?>
                                                                <a href="models/req_app.php?id=<?php echo $data['req_h']; ?>" onclick="return confirm('Aprove data?')">
                                                                    <button href data-toggle="tooltip" data-placement="left" title="Approve Data" class="btn btn-info info-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-checked"></i></button></a><?php } ?>

                                                        </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td>
                                                            <button data-toggle="tooltip" data-placement="left" title="Edit Data" class="btn btn-lime lime-icon-notika btn-reco-mg btn-button-mg" disabled><i class="notika-icon notika-menus"></i></button></a>
                                                            &nbsp;

                                                            <button href data-toggle="tooltip" data-placement="left" title="Delete Data" class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg" disabled><i class="notika-icon notika-close"></i></button></a>
                                                            &nbsp;
                                                            <?php if (@$_SESSION['level'] == 'admin') { ?>
                                                                <a href="models/req_app.php?kode=<?php echo $data['req_h']; ?>" onclick="return confirm('Aprove data?')">
                                                                    <button href data-toggle="tooltip" data-placement="left" title="Cancel Approve" class="btn btn-gray gray-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-next"></i></button></a>
                                                            <?php } ?>



                                                        </td>
                                                    <?php } ?>




                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Request No</th>
                                                <th>Request Date</th>
                                                <th>Request User</th>
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