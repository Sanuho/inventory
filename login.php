<?php
@session_start();
if (!isset($_SESSION['level']) ) {

?>
  <!doctype html>
  <html class="no-js" lang="">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Register | Notika - Notika Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- normalize CSS -->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <!-- mCustomScrollbar CSS -->
    <link rel="stylesheet" href="assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS -->
    <link rel="stylesheet" href="assets/css/wave/waves.min.css">
    <!-- Notika icon CSS -->
    <link rel="stylesheet" href="assets/css/notika-custom-icon.css">
    <!-- main CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS-->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  </head>

  <body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Login Register area Start-->
    <div class="login-content">
      <!-- Login -->

      <div class="nk-block toggled" id="l-login">
        <h1 style=" text-align: center; color: white;">Login Form</h1>
        <form method="POST" action="">
          <div class="nk-form">
            <div class="input-group">
              <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
              <div class="nk-int-st">
                <input type="text" name="user" class="form-control" placeholder="Username" required>
              </div>
            </div>
            <div class="input-group mg-t-15">
              <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
              <div class="nk-int-st">
                <input type="password" name="pass" class="form-control" placeholder="Password" required>
              </div>
            </div>
            <!-- <div class="input-group mg-t-15">
              <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
              <div class="nk-int-st">
                <div class="bootstrap-select fm-cmp-mg">
                  <select class="form-control" name="wh" data-live-search="true" required>
                    <option value="">-- Select Warehouse --</option>
                    <?php
                    include "config/koneksi.php";
                    $sql = mysqli_query($koneksi, "SELECT * FROM dept");
                    while ($isidept = mysqli_fetch_array($sql)) {
                    ?>
                      <option value="<?php echo $isidept['id_dept']; ?>"><?php echo $isidept['dept_nm']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div> -->
            <!-- <div class="fm-checkbox">
                    <label><input type="checkbox" class="i-checks"> <i></i> Keep me signed in</label>
                </div> -->
            <button type="submit" name="login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
        </form>
      </div>

      <div class="nk-navigation nk-lg-ic">
        <!-- <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
      <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a> -->
      </div>
    </div>

    <!-- Register -->
    <!-- <div class="nk-block" id="l-register">
    <div class="nk-form">
      <div class="input-group">
        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
        <div class="nk-int-st">
          <input type="text" class="form-control" placeholder="Username">
        </div>
      </div>

      <div class="input-group mg-t-15">
        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
        <div class="nk-int-st">
          <input type="password" class="form-control" placeholder="Password">
        </div>
      </div>

      <div class="input-group mg-t-15">
        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
        <div class="nk-int-st">
          <input type="password" class="form-control" placeholder="Confirm Password">
        </div>
      </div>

      <div class="input-group mg-t-15">
        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
        <div class="nk-int-st">
          <div class="bootstrap-select fm-cmp-mg">
            <select class="form-control" name="dept" data-live-search="true">
              <option value="">-- Control Department --</option>
              <?php
              include "config/koneksi.php";
              $sql = mysqli_query($koneksi, "SELECT * FROM dept");
              while ($isidept = mysqli_fetch_array($sql)) {
              ?>
                <option value="<?php echo $isidept['id_dept']; ?>"><?php echo $isidept['dept_nm']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>

      <a href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a>
    </div>

    <div class="nk-navigation rg-ic-stl">
      <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
      <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
    </div>
  </div> -->

    <!-- Forgot Password -->
    <!-- <div class="nk-block" id="l-forget-password">
    <div class="nk-form">
      <p class="text-left"></p>

      <div class="input-group">
        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
        <div class="nk-int-st">
          <input type="text" class="form-control" placeholder="Email Address">
        </div>
      </div>

      <a href="#l-login" data-ma-action="nk-login-switch" data-ma-block="#l-login" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></a>
    </div>

    <div class="nk-navigation nk-lg-ic rg-ic-stl">
      <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-login"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
      <a href="" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
    </div>
  </div> -->
    </div>
    <!-- Login Register area End-->
    <?php include "js.php"; ?>
  </body>

  </html>
<?php
  include "config/koneksi.php";
  // $dept  = @$_POST['wh'];
  $dept  = 'DEPT0001';
  $user  = @$_POST['user'];
  $pass  = @$_POST['pass'];
  $login = @$_POST['login'];
  if ($dept <> "") {

    if (isset($login)) {
      $sql = mysqli_query($koneksi, "SELECT * from user where username='$user' and password='$pass'");
      $data = mysqli_fetch_array($sql);
      $cek = mysqli_num_rows($sql);
      if ($cek > 0) {
        //@$_SESSION['Job_title']   =$data['Job_title'];
        @$_SESSION['nama']  = $data['username'];
        @$_SESSION['level'] = $data['level'];
        @$_SESSION['wh']    = 'DEPT0001';
        @$_SESSION['dept']  = $data['id_dept'];
        //@$_SESSION['avatar']=$data['avatar'];
        echo "<script type=\"text/javascript\">
              //alert(\"Welcome " . $data['level'] . "\");
              window.location = \"index.php\"
              </script>";
      } else {
        echo "<script type=\"text/javascript\">
              alert(\"Login Failed\");
              window.location = \"login.php\"
              </script>";
      }
    }
  } else {
    echo "Choose Warehouse Loc";
  }
} else {
  header("location:index.php");
}
?>