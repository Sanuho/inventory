<?php
@session_start();
include "config/koneksi.php";
if (@$_SESSION['level']) {
?>
    <!doctype html>
    <html class="no-js" lang="">
    <?php include "header.php"; ?>

    <body>
        <!-- Start Header Top Area -->
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="logo-area">
                            <h3 style="color: white">TENMA</h3>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="header-top-menu">
                            <ul class="nav navbar-nav notika-top-nav">
                                <li class="nav-item dropdown">
                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>
                                    <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                        <div class="search-input">
                                            <i class="notika-icon notika-left-arrow"></i>
                                            <input type="text" />
                                        </div>
                                    </div>
                                </li>


                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-support"></i></span></a>
                                    <div role="menu" class="dropdown-menu message-dd task-dd animated zoomIn">
                                        <div class="hd-mg-tt">
                                            <h2><?php echo @$_SESSION['nama']; ?></h2>
                                        </div>
                                        <div class="hd-message-info hd-task-info">
                                            <div class="skill">

                                            </div>
                                        </div>
                                        <div class="hd-mg-va">
                                            <a href="logout.php">Logout</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top Area -->
        <!-- Mobile Menu start -->
        <?php include "navbar.php"; ?>
        <!-- Main Menu area End-->
        <?php
        $page = @$_GET['page'];
        if ($page  == 'dashboard') {
            include "views/dashboard.php";
        } else if ($page == 'item') {
            include "views/item_entry.php";
        } else if ($page == 'item_list') {
            include "views/item_list.php";
        } else if ($page == 'item_edit') {
            include "views/item_edit.php";
        } else if ($page == 'category_entry') {
            include "views/category_entry.php";
        } else if ($page == 'receive') {
            include "views/rec_list.php";
        } else if ($page == 'receive_form') {
            include "views/rec_frm.php";
        } else if ($page == 'request') {
            include "views/req_list.php";
        } else if ($page == 'rec_edit') {
            include "views/edit_rec.php";
        } else if ($page == 'request_form') {
            include "views/req_frm.php";
        } else if ($page == 'req_edit') {
            include "views/edit_req.php";
        } else if ($page == 'receive') {
            include "views/rec_frm.php";
        } elseif ($page == 'category_edit') {
            include "views/category_edit.php";
        } elseif ($page == 'karyawan') {
            include "views/karyawan_list.php";
        } elseif ($page == 'req_per_emp') {
            include "views/report_emp.php";
        } elseif ($page == 'rep_bal_sheet') {
            include "views/report_bal_sheet.php";
        } elseif ($page == '') {
            include "views/dashboard.php";
        } else {
            echo "404 halaman tidak di temukan";
        }
        ?>
        <!-- Start Sale Statistic area-->
        <div class="footer-copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Tenma Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer area-->
        <?php include "js.php"; ?>
    </body>

    </html>
<?php

} else {
    header("location:login.php");
}
