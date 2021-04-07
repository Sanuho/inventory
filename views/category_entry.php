<?php include "config/koneksi.php"; ?>

<?php

if (isset($_POST['submit'])) {
    $carikode = mysqli_query($koneksi, "SELECT MAX(id) from category");
    $datakode = mysqli_fetch_array($carikode);
    if ($datakode) {
        $nilaikode = substr($datakode[0], 1);
        $kode = (int)$nilaikode;
        $kode = $kode + 1;
        $hasilkode = "K" . str_pad($kode, 4, "0", STR_PAD_LEFT);
    } else {
        $hasilkode = "K0001";
    }
    $name = $_POST['kode'];
    $insert = mysqli_query($koneksi, "INSERT INTO category values ('$hasilkode','$name')");
    if ($insert) {
        echo "<script type=\"text/javascript\">
              alert(\"Data Insert Successfuly!!\");
              window.location = \"index.php?page=category_entry\"
              </script>";
    } else {
        echo "<script type=\"text/javascript\">
              alert(\"Fail to insert!!\");
              window.location = \"index.php?page=category_entry\"
              </script>";
    }
}
?>
<div class="form-element-area">
    <div class="container">
        <div class="row animated zoomIn">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <form action="" method="POST">
                                <div class="form-example-wrap mg-t-30">
                                    <div class="cmp-tb-hd cmp-int-hd">
                                        <h2>CATEGORY ENTRY</h2>
                                    </div>
                                    <div class="form-example-int form-horizental">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Category</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm" name="kode" placeholder="Enter Category Name" required>
                                                        <!-- <input type="text" class="form-control input-sm" value="<?php echo $hasilkode; ?>"> -->
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
                                                <button type="submit" name="submit" class="btn btn-success notika-btn-success">Submit</button>
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
        <div class="row animated zoomIn">
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
                                                <th>ID</th>
                                                <th>CATEGORY</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($koneksi, "SELECT * FROM category");
                                            while ($data = mysqli_fetch_array($sql)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $data['id']; ?></td>
                                                    <td><?php echo $data['name']; ?></td>
                                                    <td><a href="index.php?page=category_edit&id=<?php echo $data['id']; ?>" onclick="return confirm('edit data?')">
                                                            <button data-toggle="tooltip" data-placement="left" title="Edit Data" class="btn btn-lime lime-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-menus"></i></button></a>
                                                        &nbsp;
                                                        <a href="models/hapus_category.php?id=<?php echo $data['id']; ?>" onclick="return confirm('delete data?')">
                                                            <button href data-toggle="tooltip" data-placement="left" title="Delete Data" class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-close"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>CATEGORY</th>
                                                <th>ACTION</th>
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