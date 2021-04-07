<?php 
//@session_start();
$dept=@$_SESSION['wh'];
?>
<div class="form-element-area">
        <div class="container">
            <div class="row animated zoomIn">

<div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-bar-chart"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Balance Sheet</h2>
                                        <p>Search <span class="bread-ntd">Based on date!</span></p>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">       
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form action="report/balance_sheet_excel.php" method="POST">
                          <table>

                        <th>
                        
                     <tr>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>Date From</h2>
                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-calendar"></i>
                                    </div>
                                     
                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="nk-int-st">
                                <div class="bootstrap-select fm-cmp-mg">       
                                <div class="input-group date nk-int-st">
                                        <span class="input-group-addon"></span>
                                        <input type="text" name="dateF" class="form-control" value="<?php echo date('d-m-Y');?>">
                                    </div>
                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                        </tr>
                        </th>
                        <th>
                        <tr>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>Date To</h2>
                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-calendar"></i>
                                    </div>
                                     
                        <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="nk-int-st">
                                <div class="bootstrap-select fm-cmp-mg">       
                                <div class="input-group date nk-int-st">
                                        <span class="input-group-addon"></span>
                                        <input type="text" name="dateT" class="form-control" value="<?php echo date('d-m-Y');?>">
                                    </div>
                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                        </tr>
                        </th>
                        <td>
                         <button type="submit" name="search" class="btn btn-success">
                           Search <i class="fa fa-search"></i></button></td>
                        </table>
                    </form>
                </div>
                    </div>
                </div>           
            </div>
        </div>
    </div>
    <!-- End Status area-->

 
            </div>
        </div>
    </div>
      
