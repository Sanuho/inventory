<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li><a data-toggle="collapse" data-target="#Charts" href="#">Home</a>
                                <ul class="collapse dropdown-header-top">
                                    <li><a href="index.php">Dashboard</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demoevent" href="#">Master</a>
                                <ul id="demoevent" class="collapse dropdown-header-top">
                                    <li><a href="index.php?page=item_list">Item Entry</a></li>
                                    <li><a href="index.php?page=category_entry">Category Entry</a></li>
                                    <li><a href="index.php?page=karyawan">Employee List</a>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#democrou" href="#">Transaction</a>
                                <ul id="democrou" class="collapse dropdown-header-top">
                                <li><a href="index.php?page=request">Request Form</a></li>
                            <li><a href="index.php?page=receive">Receive Form</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demolibra" href="#">Report</a>
                                <ul id="demolibra" class="collapse dropdown-header-top">
                                    <li><a href="index.php?page=req_per_emp">Request Per Employee</a></li>
                                    <li><a href="index.php?page=rep_bal_sheet">Stock Balance</a></li>
                                </ul>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
<!-- Main Menu area start-->
<div class="main-menu-area mg-tb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="active"><a data-toggle="tab" href="#Home"><i class="notika-icon notika-house"></i> Home</a>
                    </li>
                    <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-windows"></i> Master</a>
                    </li>
                    <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-edit"></i> Transaction</a>
                    </li>
                    <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-bar-chart"></i> Report</a>
                    </li>
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="Home" class="tab-pane notika-tab-menu-bg animated flipInX <?php echo 'in active'; ?>">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="index.php">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                    <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="index.php?page=item_list">Item Entry</a>
                            </li>
                            <li><a href="index.php?page=category_entry">Category Entry</a>
                            </li>
                            <li><a href="index.php?page=karyawan">Employee List</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="index.php?page=request">Request Form</a>
                            </li>
                            <li><a href="index.php?page=receive">Receive Form</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="index.php?page=req_per_emp">Request Per Employee</a>
                            </li>
                            <li><a href="index.php?page=rep_bal_sheet">Stock Balance</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>