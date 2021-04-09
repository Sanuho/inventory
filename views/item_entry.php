    <?php include "config/koneksi.php";
    if (isset($_POST['add'])) {

        $carikode = mysqli_query($koneksi, "SELECT max(item_cd) from item");
        $datakode = mysqli_fetch_array($carikode);
        if ($datakode) {
            $nilaikode = substr($datakode[0], 2);
            $kode = (int)$nilaikode;
            $kode = $kode + 1;
            $hasilkode = "BR" . str_pad($kode, 5, "0", STR_PAD_LEFT);
        } else {
            $hasilkode = "BR00001";
        }
    }
    ?>


    <div class="form-element-area">
        <div class="container animated zoomIn">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-example-wrap mg-t-30">
                                        <div class="cmp-tb-hd cmp-int-hd">
                                            <h2>ITEM ENTRY</h2>
                                        </div>
                                        <div class="form-example-int form-horizental">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">Item Code</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                        <div class="nk-int-st">
                                                            <input type="text" name="kode" class="form-control input-sm" value="<?php echo $hasilkode; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-example-int form-horizental mg-t-15">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">Item Name</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                        <div class="nk-int-st">
                                                            <input type="text" name="nama" class="form-control input-sm" placeholder="Enter Item Name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-example-int form-horizental mg-t-15">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">Category</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                        <div class="nk-int-st">
                                                            <div class="bootstrap-select fm-cmp-mg">
                                                                <select class="selectpicker" name="cate" data-live-search="true" required>
                                                                    <?php
                                                                    $sql = mysqli_query($koneksi, "SELECT * FROM category");
                                                                    while ($isicate = mysqli_fetch_array($sql)) {
                                                                    ?>
                                                                        <option value="<?php echo $isicate['id']; ?>"><?php echo $isicate['name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-example-int form-horizental mg-t-15">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">Unit</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                        <div class="nk-int-st">
                                                            <div class="bootstrap-select fm-cmp-mg">
                                                                <select class="selectpicker" name="unit" data-live-search="true" required>
                                                                    <?php
                                                                    $sql = mysqli_query($koneksi, "SELECT * FROM unit");
                                                                    while ($isicate = mysqli_fetch_array($sql)) {
                                                                    ?>
                                                                        <option value="<?php echo $isicate['unit_cd']; ?>"><?php echo $isicate['unit_nm']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-example-int form-horizental mg-t-15">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">Min Stock</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                        <div class="nk-int-st">
                                                            <input type="number" name="min" class="form-control input-sm" placeholder="Enter Min Stock">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-example-int form-horizental mg-t-15">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">Max Stock</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                        <div class="nk-int-st">
                                                            <input type="number" name="max" class="form-control input-sm" placeholder="Enter Max Stock">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-example-int form-horizental mg-t-15">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">Note</label>
                                                    </div>
                                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                        <div class="nk-int-st">
                                                            <input type="text" name="note" class="form-control input-sm" placeholder="Note">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-example-int mg-t-15">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <button type="Submit" name="submit" class="btn btn-success notika-btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    if (isset($_POST['submit'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $cat  = $_POST['cate'];
        $dept = @$_SESSION['dept'];
        $min  = $_POST['min'];
        $max  = $_POST['max'];
        $unit = $_POST['unit'];
        $note = $_POST['note'];
        $sql = mysqli_query($koneksi, "INSERT INTO item (item_cd,item_nm,id,qty,id_dept,min,max,remark,unit_cd)values('$kode','$nama','$cat',0,'$dept','$min','$max','$note','$unit')");
        if ($sql) {
            echo "<script type=\"text/javascript\">
              alert(\"Item Registered!!\");
              window.location = \"index.php?page=item_list\"
              </script>";
        } else {
            echo "<script type=\"text/javascript\">
              alert(\"Item Register Failed!!\");
              window.location = \"index.php?page=item_list      \"
              </script>";
        }
    }
    ?>