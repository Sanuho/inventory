<?php
include "config/koneksi.php";

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
                                        <i class="notika-icon notika-app"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Employee list</h2>
                                        <p>Reload <span class="bread-ntd">Employee data!!</span></p>
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
                    <form action="models/karyawan_reload.php" method="POST">
                          <table>
                        <th>
                 <button type="submit" name="add" class="btn btn-success">
                           Reload <i class="notika-icon notika-refresh"></i></button>
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
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                    <thead>
                                        <tr>
                           <th>NIK</th>
                          <th>NAMA</th>
                          <th>DEPARTEMEN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($koneksi,"SELECT * FROM karyawan");
while($data=mysqli_fetch_array($sql))
{
?>
            <tr>
            <td><?php echo $data['nik'];?></td>
            <td><?php echo $data['nama_karyawan'];?></td>
            <td><?php echo $data['dept'];?></td>
            </tr>
<?php
}
?>
                                    </tbody>
                            <tfoot>
                                <tr>
                           <th>NIK</th>
                          <th>NAMA</th>
                          <th>DEPARTEMEN</th>
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
      
