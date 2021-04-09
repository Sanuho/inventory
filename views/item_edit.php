<?php include "config/koneksi.php";
if (isset($_GET['id'])) {
    $kode = $_GET['id'];
    $carikode = mysqli_query($koneksi, "SELECT item.*,category.name,unit.unit_nm from item,category,unit where item_cd='$kode' AND item.id=category.id AND item.unit_cd=unit.unit_cd");
    $data = mysqli_fetch_array($carikode);
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
                                                        <input type="text" name="kode" class="form-control input-sm" value="<?php echo $data['item_cd']; ?>" readonly>
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
                                                        <input type="text" name="nama" class="form-control input-sm" value="<?php echo $data['item_nm']; ?>" placeholder="Enter Item Name">
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
                                                            <select class="selectpicker" name="cate" data-live-search="true">
                                                                <option value="<?php echo $data['id']; ?>" selected><?php echo $data['name']; ?></option>
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
                                                                <option value="<?php echo $data['unit_cd']; ?>" select><?php echo $data['unit_nm']; ?></option>
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
                                                        <input type="number" name="min" class="form-control input-sm" value="<?php echo $data['min']; ?>" placeholder="Enter Min Stock">
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
                                                        <input type="number" name="max" class="form-control input-sm" value="<?php echo $data['max']; ?>" placeholder="Enter Max Stock">
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
                                                        <input type="text" name="note" class="form-control input-sm" value="<?php echo $data['remark']; ?>" placeholder="Note">
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
    $cat = $_POST['cate'];
    $dept = @$_SESSION['dept'];
    $min = $_POST['min'];
    $max = $_POST['max'];
    $unit = $_POST['unit'];
    $note = $_POST['note'];
    $sql = mysqli_query($koneksi, "UPDATE item SET item_nm='$nama',id='$cat',id_dept='$dept',min='$min',max='$max',remark='$note',unit_cd='$unit' Where item_cd='$kode'");
    if ($sql) {
        echo "<script type=\"text/javascript\">
              alert(\"Item Updated!!\");
              window.location = \"index.php?page=item_list\"
              </script>";
    } else {
        echo "<script type=\"text/javascript\">
              alert(\"Item Updated Failed!!\");
              window.location = \"index.php?page=item_list\"
              </script>";
    }
}
?>