<div class="form-element-area">
    <div class="container">
        <div class="row animated zoomIn">
            <!-- Data Table area Start-->
            <div class="data-table-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form action="models/add_rec.php" method="POST">
                                <table>
                                    <th>
                                        <button type="submit" name="add" class="btn btn-success">
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
                                                <th>Receive No</th>
                                                <th>Receive Date</th>
                                                <th>Receive User</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $wh = @$_SESSION['wh'];
                                            $sql = mysqli_query($koneksi, "SELECT * FROM incoming_h");
                                            while ($data = mysqli_fetch_array($sql)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $data['rec_h']; ?></td>
                                                    <td><?php echo $data['date']; ?></td>
                                                    <td><?php echo $data['user']; ?></td>

                                                    <td>
                                                        <a href="index.php?page=rec_edit&id=<?php echo $data['rec_h']; ?>" onclick="return confirm('edit data?')">
                                                            <button data-toggle="tooltip" data-placement="left" title="Edit Data" class="btn btn-lime lime-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-menus"></i></button></a>
                                                        &nbsp;
                                                        <a href="models/hapus_rec_h.php?id=<?php echo $data['rec_h']; ?>" onclick="return confirm('delete data?')">
                                                            <button href data-toggle="tooltip" data-placement="left" title="Delete Data" class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-close"></i></button></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Receive No</th>
                                                <th>Receive Date</th>
                                                <th>Receive User</th>
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