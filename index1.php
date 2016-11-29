<?php
SESSION_start();
include "koneksi.php";

if(isset($_SESSION['admin'])){
   header("location: admin1.php");
} else if(isset($_SESSION['dosen'])){
   header("location: dosen1.php");
} else if(isset($_SESSION['mhs'])){
   header("mhs1.php");
}else  {
?>

<html>
<head>
	<title>Login</title>
</head>
<body>
	<h2>Pengambilan Mata Kuliah </h2>
	
	
	<h3>Masukkan username dan password</h3>
    <form action="" method="post">
       <input type="text" name="username" >
       <input type="password" name="password" >
       <input type="submit" name="login" value="Enter">
        
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
            $sql = mysql_query("SELECT * FROM user WHERE username = '$username' AND password = '$password'") or die (mysql_error());
            $data = mysql_fetch_array($sql);
           $cek = mysql_num_rows($sql);
            if($cek >= 1){
                
                if($data['level'] == "1"){
                     $_SESSION['admin'] = $data['id_user'];
                    header("location:admin1.php");
                } else if($data['level'] == "2"){
                     $_SESSION['dosen'] = $data['id_user'];
                    header("location:dosen1.php");
                }else if($data['level'] == "3"){
                     $_SESSION['mhs'] = $data['id_user'];
                    header("location:mhs1.php");
                }
            } else {
               echo "<script type='text/javascript'>
                   alert('Username / password salah!');
          </script>";
            }
        }
    } 
?>
          
    
    
    </body>
</html>
<?php
}
?>