<link rel="stylesheet" href="select2.min.css" />
<?php include "config/koneksi.php";
$wh = @$_SESSION['wh'];
if (isset($_POST['add'])) {



    $cek = mysqli_query($koneksi, "SELECT max(rec_h) from incoming_h");
    $lastrow = mysqli_fetch_array($cek);

    $last = $lastrow[0];
    $check = mysqli_query($koneksi, "SELECT * FROM incoming_d where rec_h='$last'");
    $num_rows = mysqlI_num_rows($check);
    if ($num_rows > 0) {
        $bulan      = date('m');
        $tahun      = date('Y');
        $tahunAkhir = substr($tahun, 2, 2);
        $tglkode    = $tahunAkhir . $bulan;
        $carikode   = mysqli_query($koneksi, "SELECT max(rec_h) from incoming_h");
        $datakode   = mysqli_fetch_array($carikode);
        if ($datakode) {
            $nilaitahun = substr($datakode[0], 2, 2);
            $nilaibulan = substr($datakode[0], 4, 2);
            if ($nilaitahun < $tahunAkhir) {
                $nilaikode = "0000";
            } else {
                $nilaikode = substr($datakode[0], 6);
            }
            if ($nilaibulan < $bulan) {
                $nilaikode = "0000";
            } else {
                $nilaikode = substr($datakode[0], 6);
            }
            $kode = (int)$nilaikode;
            $kode = $kode + 1;
            $hasilkode = "IH" . $tglkode . str_pad($kode, 4, "0", STR_PAD_LEFT);
        } else {
            $hasilkode = "IH" . $tglkode . "0001";
        }
        $waktu = gmdate("H:i:s", time() + 60 * 60 * 7);
        $tanggal = date('Y-m-d');
        $user = @$_SESSION['nama'];
        $sql = mysqli_query($koneksi, "INSERT Into incoming_h (rec_h,date,time,user,id_dept) values('$hasilkode','$tanggal','$waktu','$user','$wh')");
    } else {
        $hasilkode = $last;
    }
}
?>
<div class="form-element-area">
    <div class="container animated zoomIn">
        <div class="modal fade" id="myModalthree" role="dialog">
            <div class="modal-dialog modal-large">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Add Item Here</h2>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form name="add" id="add">
                        <table class="table table-responsive">
                            <div class="modal-body">
                                <tr>
                                    <td>Item</td>
                                    <td>
                                        <div class="form-example-int form-horizental mg-t-15">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="nk-int-st">
                                                            <div class="chosen-select-act">
                                                                <select class="chosen" data-placeholder="No Data" name="category">
                                                                    <?php
                                                                    $sql = mysqli_query($koneksi, "SELECT * FROM category");
                                                                    while ($isigrup = mysqli_fetch_array($sql)) {
                                                                    ?>
                                                                        <optgroup label='<?php echo $isigrup['name']; ?>'>
                                                                            <?php
                                                                            $sqlc = mysqli_query($koneksi, "SELECT * from item where id='" . $isigrup['id'] . "' AND stat=1");
                                                                            while ($isicombo = mysqli_fetch_array($sqlc)) {
                                                                            ?>
                                                                                <option value="<?php echo $isicombo['item_cd']; ?>"><?php echo $isicombo['item_nm']; ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </optgroup>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Qty</td>
                                    <td><input type="text" name="qty" class="form-control" placeholder="Input Qty" required>
                                        <input type="hidden" name="reqd" class="form-control" value="<?php echo $hasilkode; ?>">
                                    </td>
                                </tr>

                            </div>
                        </table>
                        <div class="modal-footer">
                            <button type="button" name="submit" id="submit" data-dismiss="modal" class="btn btn-default">Save changes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $itm = $_POST['category'];
                        $qty = $_POST['qty'];
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-example-wrap mg-t-30">
                                <div class="cmp-tb-hd cmp-int-hd">
                                    <h2>RECEIVE ENTRY</h2>
                                </div>
                                <form action="" method="POST">
                                    <div class="form-example-int form-horizental mg-t-15">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Receive NO</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm" value="<?php echo $hasilkode; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental mg-t-15">
                                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Receive date</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <div class="bootstrap-select fm-cmp-mg">
                                                            <div class="input-group date nk-int-st">
                                                                <span class="input-group-addon"></span>
                                                                <input type="text" class="form-control" value="<?php echo date('d-M-Y'); ?>">
                                                            </div>
                                                        </div>
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
        </div>
    </div>

    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Detail No</th>
                                        <th>Item Name</th>
                                        <th>QTY</th>
                                        <th>Header No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="isi_tabel">
                                </tbody>
                                <tfoot>
                                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalthree"><i class="fa fa-plus-square"></i> Add</button></td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->

    <script>
        $('#qty').focus(function() {
            //open bootsrap modal
            $('#myModalthree').modal({
                show: true
            });
        });
    </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

    <script type="text/javascript">
        fetch();
        setInterval(function() {
            fetch();
        }, 500);

        function fetch() {
            var action = "<?php echo $hasilkode; ?>";
            $.ajax({
                url: "models/receive.php",
                method: "POST",
                data: {
                    action: action
                },
                success: function(data) {
                    $('.isi_tabel').html(data);
                }
            });
        }

        $('#submit').click(function() {
            var answer = confirm('Are you sure you want to save?');
            if (answer === false) {
                return false;
            } else {
                $.ajax({
                    url: "models/rec_add.php",
                    method: "POST",
                    data: $('#add').serialize(),
                    success: function(data) {
                        alert(data);
                        $('#add')[0].reset();
                    }
                });
            }
        });
    </script>