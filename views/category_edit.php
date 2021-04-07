<?php include "config/koneksi.php"; ?>
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="style.css">
         <script src="../dist/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="../dist/sweetalert.css">

<?php
$kode=$_GET['id'];
$query=mysqli_query($koneksi,"SELECT * from category where id='$kode'") or die (mysqli_error());
$show=mysqli_fetch_array($query);
if (isset($_POST['submit'])) {
$cate=$_POST['cate'];
$id=$_POST['id'];
$insert=mysqli_query($koneksi,"UPDATE category set name='$cate' where id='$id'");
if($insert) {
  echo "<script type=\"text/javascript\">
              alert(\"Data Update Successfuly!!\");
              window.location = \"index.php?page=category_entry\"
              </script>";
}
else{
          echo "<script type=\"text/javascript\">
              alert(\"Fail to update!!\");
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
                        <h2>CATEGORY EDIT</h2>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">ID</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" value="<?php echo $_GET['id'];?>" class="form-control input-sm" name="id" placeholder="Enter ID" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Category</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" value="<?php echo $show['name'];?>" class="form-control input-sm" name="cate" placeholder="Enter Category Name" required>
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
            
        </div>
    </div>
      