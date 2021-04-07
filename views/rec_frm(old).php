    <?php include "config/koneksi.php"; ?>  
    <div class="form-element-area">
        <div class="container animated zoomInDown">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <form action="" method="POST">
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                        <h2>ITEM RECEIVE ENTRY</h2>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Receive NO</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="RECEIVE NO">
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
                                        <input type="text" class="form-control" value="<?php echo date('d-M-Y');?>">
                                    </div>
                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<br/>
<br/>
<br/>                                           
                      <table class="table table-sc-ex" id="dynamic_field">
                        <tr>       
                        <td>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="nk-int-st">
                                              <div class="chosen-select-act">
                                    <select class="chosen" data-placeholder="No Data" name="category[]">
                                        <?php
$sql=mysqli_query($koneksi,"SELECT * FROM category" );
while($isigrup=mysqli_fetch_array($sql)){
                                        ?>
                                            <optgroup label='<?php echo $isigrup['name'];?>'>
                                        <?php
$sqlc=mysqli_query($koneksi,"SELECT * from item where id='".$isigrup['id']."'" );
while($isicombo=mysqli_fetch_array($sqlc)){
                                        ?>
                                                <option><?php echo $isicombo['item_nm'];?></option>
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
                        <td>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" style="margin-top: 15px;" class="form-control input-sm" placeholder="Enter QTY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>  
                        <td><button  type="button" style="margin-top: 15px;"  name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                    </table>
                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button class="btn btn-success notika-btn-success">Submit</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/chosen/chosen.jquery.js"></script>
<script>
$(document).ready(function(){
    var i=1;
    $('#add').click(function(){
        i++;
        html_code = "<tr id='row"+i+"'>";
        html_code += "<td><div class='form-example-int form-horizental mg-t-15'><div class='form-group'><div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'><div class='nk-int-st'><div class='chosen-select-act'> <select class='chosen' data-placeholder='No Data' name='category[]'>";
         html_code +='';
   <?php
$sql=mysqli_query($koneksi,"SELECT * FROM category" );
while($isigrup=mysqli_fetch_array($sql)){
                                        ?>
html_code += "<optgroup label='<?php echo $isigrup['name'];?>'>";

<?php
$sqlc=mysqli_query($koneksi,"SELECT * from item where id='".$isigrup['id']."'" );
while($isicombo=mysqli_fetch_array($sqlc)){
                                        ?>
html_code += "<option><?php echo $isicombo['item_nm'];?></option>";
       <?php
                                           }
                                               ?>
html_code += "</optgroup>";
 <?php
}
                                            ?>
  html_code += "</select></div></div></div></div></div></div></td>";
  html_code += "<td><div class='form-example-int form-horizental'><div class='form-group'><div class='row'><div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'><div class='nk-int-st'><input type='text' style='margin-top: 15px;' class='form-control input-sm' placeholder='Enter QTY'></div> </div></div></div></div></td>";
   
    html_code += "<td><button type='button' style='margin-top: 30px;' name='remove' id="+i+" class='btn btn-danger btn_remove'>X</button></td>";   
    html_code += "</tr>";  
    $('#dynamic_field').append(html_code);
    });
    
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
    });
    

    
});
</script>
