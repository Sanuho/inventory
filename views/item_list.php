<?php
//@session_start();
$dept = @$_SESSION['wh'];
?>
<div class="form-element-area">
    <div class="container">
        <div class="row animated    ">

            <div class="breadcomb-area" style="margin-bottom: 10px;">
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
                        <div class="alert alert-success alert-dismissible" role="alert" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <p id="msg-success">Success</p>
                        </div>
                        <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                            <p id="msg-error">Success</p>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="wb-traffic-inner notika-shadow sm-res-mg-t-10 tb-res-mg-t-10">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
            <!-- End Status area-->

            <!-- Data Table area Start-->
            <div class="data-table-area">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="data-table-list">
                                <div class="table-responsive" id="dataTable">
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
                                        <tbody class="isi_tabel">

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
<script src="assets/js/maruti/jquery.min.js"></script>
<script>
    fetch();
    $(document).ready(function() {
		 $('#data-table-basic').DataTable({
            "order": [[ 5, "asc" ]]
         });
	});

    function fetch() {
        var action = "fetch";
        $.ajax({
            url: "models/fetch_item.php",
            method: "POST",
            data: {
                action: action
            },
            success: function(data) {
                $('.isi_tabel').html(data);
            }
        });
    }

    function alertMsg(type, text) {
        // alert(type);
        if (type == "success") {
            // document.getElementsByClassName('alert-success').style.display = "";
            // $('.alert-success').show();​​​​​​
            document.getElementById('msg-success').innerHTML = text;
            $(".alert-success").fadeTo(10000, 500).slideUp(500, function() {
                $(".alert-success").slideUp(500);
            });
        } else if (type == "error") {
            // document.getElementsByClassName('alert-danger').style.display = "";
            // $('.alert-danger').show();
            document.getElementById('msg-error').innerHTML = text;
            $(".alert-danger").fadeTo(10000, 500).slideUp(500, function() {
                $(".alert-danger").slideUp(500);
            });
        }
    }

    function ConfirmDelete(id, no) {
        if (id == 1) {
            var x = confirm("Are you sure you want to disable ?");
            var a = "disable";
        } else {
            var x = confirm("Are you sure you want to activate ?");
            var a = "activate";
        }

        if (x) {
            $.ajax({
                url: "models/disable_item.php?action=" + id + "&id=" + no,
                method: "POST",
                data: {
                    id: id,
                    req: no
                },
                success: function(data) {
                    alertMsg("success", "Success " + a);
                    fetch();
                },
                error: function() {
                    alertMsg("error", "Error delete item" + a);
                }

            });
        } else {
            return false;
        }
    }
</script>