<?php
SESSION_start();
include "koneksi.php";

if(isset($_SESSION['adminproject'])){
   header("location: admin.php");
} else if(isset($_SESSION['dosenproject'])){
   header("location: dosen.php");
} else if(isset($_SESSION['mhsproject'])){
   header("mhs.php");
}else  {
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>SIAKAD </title>
    <!-- BOOTSTRAP STYLE SHEET -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONT AWESOME ICONS STYLE SHEET -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES -->
     <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body >
    <div class="navbar navbar-default"> 
        <div class="container">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="#">Sistem Informasi Akademik</a>
            </div>
            

        </div>
    </div>
    <!-- NAVBAR CODE END -->
    <div class="container">
      
         <!-- USER PROFILE ROW STARTS-->
            <div class="row">
                
                <div class="col-md-4 col-sm-4"></div>
                <div class="col-md-4 col-sm-4">
                                       
                    <div class="user-wrapper">
                     <form action="" method="post">
                    <div class="description">
                       <h4> Login</h4><hr />
                        <div class="form-group">
    <label >Username</label>
    <input type="text" name="username" class="form-control" />
  </div>
   <div class="form-group">
    <label >Password</label>
    <input type="password" name="password" class="form-control" />
  </div>     
                        <input type="submit" name="login" class="btn btn-primary btn-sm" value="Login"> 
                    </div>
                        </form>  
                         <?php
      
    $username = @$_POST['username'];
    $password = @$_POST['password'];
    $login = @$_POST['login'];
    
    if($login){
        if($username == "" || $password == ""){
           
          echo "<script type='text/javascript'>
                   alert('Username / password tidak boleh kosong!');
          </script>";
        } else {
            $sql = mysql_query("SELECT * FROM user WHERE nomor = '$username' AND pass = '$password'") or die (mysql_error());
            $data = mysql_fetch_array($sql);
           $cek = mysql_num_rows($sql);
            if($cek >= 1){
                
                if($data['level'] == "0"){
                     $_SESSION['adminproject'] = $data['idu'];
                    header("location:admin.php");
                } else if($data['level'] == "1"){
                     $_SESSION['dosenproject'] = $data['idu'];
                    header("location:dosen.php");
                }else if($data['level'] == "2"){
                     $_SESSION['mhsproject'] = $data['idu'];
                    header("location:mhs.php");
                }
            } else {
               echo "<script type='text/javascript'>
                   alert('Username / password salah!');
          </script>";
            }
        }
    } 
?>
          
                        
                     </div>
                </div>
                
                 <div class="col-md-4 col-sm-4"></div>
            </div>
           <!-- USER PROFILE ROW END-->
    </div>
    <?php
    $thn = date('Y')
    ?>
      
    <footer>
        <div class="navbar navbar-default" style="margin-top:130px;margin-bottom:0px;"> 
        <div class="container">
            <div class="navbar-header">
            <div class="row">
                <div class="col-md-12">
                    &copy; <?php echo $thn;?> Sistem Informasi 
                </div>

            </div>
                 </div>
                 </div>
        </div>
    </footer>
   
    <!-- CONATINER END -->
    <!-- REQUIRED SCRIPTS FILES -->
    <!-- CORE JQUERY FILE -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- REQUIRED BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
</body>

</html>
<?php
}
?>
