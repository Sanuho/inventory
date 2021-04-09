    <!-- Start Status area -->
    <?php include "config/koneksi.php"; ?>
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <?php
                                $query=mysqli_query($koneksi,"SELECT * from item ");
                                $count=mysqli_num_rows($query);
                            ?>
                            <h2><span class="counter"><?=$count?></span></h2>
                            <p>Total Item Registered</p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <?php
                                $query=mysqli_query($koneksi,"SELECT * from request_h ");
                                $count=mysqli_num_rows($query);
                            ?>
                            <h2><span class="counter"><?=$count?></span></h2>
                            <p>Total Request Count</p>
                        </div>
                        <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <?php
                                $query=mysqli_query($koneksi,"SELECT * from incoming_h ");
                                $count=mysqli_num_rows($query);
                            ?>
                            <h2><span class="counter"><?=$count?></span></h2>
                            <p>Total Receive Count</p>
                        </div>
                        <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <?php
                                $query=mysqli_query($koneksi,"SELECT * from user ");
                                $count=mysqli_num_rows($query);
                            ?>
                            <h2><span class="counter"><?=$count?></span></h2>
                            <p>Total Users Count</p>
                        </div>
                        <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Status area-->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="table-responsive">
                        <div class="curved-inner-pro">
                            <div class="curved-ctn">
                                <h2>Current Stock</h2>
                                <!-- <p>Vestibulum purus quam scelerisque, mollis nonummy metus</p> -->
                            </div>
                        </div>
                        <table id="data-table-basic" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align:center">Item Code</th>
                                    <th style="text-align:center">Item Name</th>
                                    <th style="text-align:center">Stock</th>
                                    <th style="text-align:center">Min Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($koneksi, "SELECT * FROM item where stat=1");
                                while ($data = mysqli_fetch_array($sql)) {
                                    if ($data['qty'] <= $data['min']) {
                                        $warna = 'background-color: #ff6666';
                                    } else {
                                        $warna = 'background-color: ';
                                    }
                                ?>
                                    <tr style="<?= $warna ?>">
                                        <td><?php echo $data['item_cd']; ?></td>
                                        <td><?php echo $data['item_nm']; ?></td>
                                        <td style="text-align:center"><?php echo $data['qty']; ?></td>
                                        <td style="text-align:center"><?php echo $data['min']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="text-align:center">Item Code</th>
                                    <th style="text-align:center">Item Name</th>
                                    <th style="text-align:center">Stock</th>
                                    <th style="text-align:center">Min Stock</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

