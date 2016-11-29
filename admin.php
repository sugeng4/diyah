<?php
@SESSION_start();
include "koneksi.php";
if($_SESSION['admin']){
    $mk = @$_GET['mk'];
	$user = $_SESSION['admin'];   
    $panggil = mysql_query("SELECT * FROM user WHERE id_user = $user") or die(mysql_error());
    $datauser = mysql_fetch_assoc($panggil);
    $id = $datauser['username'];
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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Aktif : <?php echo $id  ?></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right  ">
                    <li><a href="admin.php">Input</a></li>
                    <li><a href="sajian.php">Matakuliah</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- NAVBAR CODE END -->
    <div class="container">
       
         <!-- USER PROFILE ROW STARTS-->
              <div class="row">  
               
                      
                <div class="col-md-3 col-sm-3 col-xs-1"></div>
                   <div class="col-md-6 col-sm-6 col-xs-10">  
                       <div class="user-wrapper">
 <?php                          
   if(isset($mk)){
       $ambil = mysql_fetch_assoc(mysql_query("SELECT * FROM matakuliah INNER JOIN dosen ON matakuliah.kode_dos = dosen.kode_dos WHERE id_mk = '$mk'")) or die (mysql_error());
              
        $kodemk = @$ambil['kode_mk'];
        $namamk = @$ambil['nama_mk'];
        $sks = @$ambil['sks'];
        $ruang = @$ambil['ruang'];
        $hari = @$ambil['hari'];
        $jam = @$ambil['jam_ke'];
        $dosen = @$ambil['kode_dos'];
        $namadosen = @$ambil['dosen_pengampu'];
        $kapasitas = @$ambil['kapasitas'];
       
    echo '                       
        <div class="description">
                        <h3>Edit Mata Kuliah </h3>
                    <div class="user-wrapper">
                        <table border="1">
        <form action="" method="post">
  <div class="form-group">
    <label >Kode MK</label>
    <input type="text" name="kodemk" class="form-control" value="' . $kodemk . '"/>
  </div>       
   <div class="form-group">
    <label >Nama Mata Kuliah</label>
    <input type="text" name="namamk" class="form-control" value="' . $namamk . '"/>
  </div> 
    <div class="form-group">
    <label >SKS</label>
    <input type="text" name="sks" class="form-control" value="' . $sks . '"/>
  </div> 
	  <div class="form-group">
    <label >Ruang</label>
    <input type="text" name="ruang" class="form-control" value="' . $ruang . '"/>
  </div> 	
  <div class="form-group">
    <label >Hari</label>
    <input type="text" name="hari" class="form-control" value="' . $hari . '"/>
  </div>        
   <div class="form-group">
    <label >Jam ke-</label>
    <input type="text" name="jam" class="form-control" value="' . $jam . '"/>
  </div>    
   <div class="form-group">
    <label >Kode Dosen</label>
    
    
    
    	<select name="dosen" class="form-control" placeholder="" style="border-radius:10px 0 0 10px;" >
                        <option value="' . $dosen . '" >' . $dosen .' | ' . $namadosen . '</option>';
                        
$pilihdosen = mysql_query("SELECT * FROM dosen WHERE kode_dos != '$dosen' ORDER BY kode_dos ASC");
while ($dosen = mysql_fetch_array($pilihdosen)) {           
    $kodedosen = $dosen['kode_dos'];
    $namadosen = $dosen['dosen_pengampu'];
    
  echo '        		<option value="'.$kodedosen.'"> ' . $kodedosen .' | ' . $namadosen . '</option>';
    }
 echo '
					    </select>
    
    
    
    
    
  </div>    
     <div class="form-group">
    <label >Kapasitas</label>
    <input type="text" name="kapasitas" class="form-control" value="' . $kapasitas . '"/>
  </div>    
       <input type="submit" name="edit" value="Ubah">
       
       
            </form>
            
            </table>
                        </div>
    </div>
            
   ';   
       
    
    	if(isset($_POST['edit'])){
        $kodemk = @$_POST['kodemk'];
        $namamk = @$_POST['namamk'];
        $sks = @$_POST['sks'];
        $ruang = @$_POST['ruang'];
        $hari = @$_POST['hari'];
        $jam = @$_POST['jam'];
        $dosen = @$_POST['dosen'];
        $kapasitas = @$_POST['kapasitas'];
            $update = mysql_query("UPDATE matakuliah SET
             kode_mk = '$kodemk',
             nama_mk = '$namamk',
             sks = '$sks', 
             ruang = '$ruang', 
             hari = '$hari', 
             jam_ke = '$jam', 
             kode_dos = '$dosen', 
             kapasitas = '$kapasitas'
             WHERE id_mk = $mk")or die(mysql_error());
          if($update){
        
        echo "<script type='text/javascript'>
alert('Berhasil mengubah mata kuliah!');
   document.location='admin.php';
   </script> ";
         } else  {
        echo "<script type='text/javascript'>
        alert('Gagal mengubah mata kuliah!');
   document.location='admin.php';
   </script> ";
         }    
        }
       
	
                         
   }else{
    echo '                         
          <div class="description">
                        <h3>Input Mata Kuliah </h3>
                    <div class="user-wrapper">
                        <table border="1">
        <form action="" method="post">
  <div class="form-group">
    <label >Kode MK</label>
    <input type="text" name="kodemk" class="form-control" />
  </div>       
   <div class="form-group">
    <label >Nama Mata Kuliah</label>
    <input type="text" name="namamk" class="form-control" />
  </div> 
    <div class="form-group">
    <label >SKS</label>
    <input type="text" name="sks" class="form-control" />
  </div> 
	  <div class="form-group">
    <label >Ruang</label>
    <input type="text" name="ruang" class="form-control" />
  </div> 	
  <div class="form-group">
    <label >Hari</label>
    <input type="text" name="hari" class="form-control" />
  </div>        
   <div class="form-group">
    <label >Jam ke-</label>
    <input type="text" name="jam" class="form-control" />
  </div>    
   <div class="form-group">
    <label >Kode Dosen</label>
    
    
    
    
					   	<select name="dosen" class="form-control" placeholder="" style="border-radius:10px 0 0 10px;" >
                        <option value="" >Pilih Dosen</option>';
                        
$pilihdosen = mysql_query("SELECT * FROM dosen ORDER BY kode_dos ASC");
while ($dosen = mysql_fetch_array($pilihdosen)) {           
    $kodedosen = $dosen['kode_dos'];
    $namadosen = $dosen['dosen_pengampu'];
    
  echo '        		<option value="'.$kodedosen.'"> ' . $kodedosen .' | ' . $namadosen . '</option>';
    }
 echo '
					    </select>
   
 
  </div>    
     <div class="form-group">
    <label >Kapasitas</label>
    <input type="text" name="kapasitas" class="form-control" />
  </div>    
       <input type="submit" name="tambah" value="Tambahkan">
       
       
            </form>
            
            </table>
                        </div>
    </div>   
            
            
  ';            
        
        $kodemk = @$_POST['kodemk'];
        $namamk = @$_POST['namamk'];
        $sks = @$_POST['sks'];
        $ruang = @$_POST['ruang'];
        $hari = @$_POST['hari'];
        $jam = @$_POST['jam'];
        $dosen = @$_POST['dosen'];
        $kapasitas = @$_POST['kapasitas'];
    
    	if(isset($_POST['tambah'])){
            $input = mysql_query("insert into matakuliah values('', '$kodemk', '$namamk', '$sks', '$ruang', '$hari', '$jam', '$dosen', '$kapasitas')")or die(mysql_error());
             if($input){
        
        echo "<script type='text/javascript'>
        alert('Berhasil menambah mata kuliah!');
   document.location='admin.php';
   </script> ";
         } else  {
        echo "<script type='text/javascript'>
        alert('Gagal menambah mata kuliah!');
   document.location='admin.php';
   </script> ";
         }    
        }
       
	
                          
   }
 ?>                          
                           
                           
                           
                           
                    </div>
                     </div>
              <div class="col-md-3 col-sm-3 col-xs-1"></div>
            
            </div>
           <!-- USER PROFILE ROW END-->
    </div>
    <!-- CONATINER END -->
    <!-- REQUIRED SCRIPTS FILES -->
    <!-- CORE JQUERY FILE -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- REQUIRED BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
</body>

</html>
<?php
} else {
    header("location: index.php");
}
?>