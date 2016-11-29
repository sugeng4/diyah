<?php
@SESSION_start();
include "koneksi.php";
$mk = $_GET['mk'];
if($_SESSION['dosenproject']){
 $user = $_SESSION['dosenproject'];   
    $panggil = mysql_query("SELECT * FROM user INNER JOIN dosen ON dosen.idu = user.idu WHERE user.idu = $user") or die(mysql_error());
    $datauser = mysql_fetch_assoc($panggil);
    $id = $datauser['idu'];
  
    $dos = $datauser['nama_dosen'];
    $nip = $datauser['nomor'];
    
    
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
                <a class="navbar-brand" href="#">Sistem Informasi Akademik</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right  ">
                     <li><a href="dosen.php">Home</a></li>
                 
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- NAVBAR CODE END -->
    <div class="container">
        <div class="row">
                <div class="col-md-12 text-center">
                    <h2><?php echo $dos  ?></h2>

                   
               
                    <br />
                    <br />
                    
                </div>
            </div>
         <!-- USER PROFILE ROW STARTS-->
            <div class="row">
                <div class="col-md-2 col-sm-2">
                                       
                    <div class="user-wrapper">
                        <img src="assets/img/<?php echo $nip;?>.jpg" class="img-responsive" /> 
                    <div class="description">
                       <h5>NIP : <?php echo $nip  ?> </h5>
                    </div>
                     </div>
                </div>
                
                <div class="col-md-10 col-sm-10  user-wrapper">
                    <div class="description">
                       
                    	 <div class="table-responsive">
                    <table class="table no-margin" style="font-size:12px;">
                      <thead>
		<tr>
			<th>No.</th>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>Tugas</th>
            <th>Kuis</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>Kelas</th>
            <th>Tindakan</th>
                    
		</tr>
                        </thead>
                        <tbody>
        <?php
		//iclude file koneksi ke database
		include('koneksi.php');
		
		$query1 = mysql_query("SELECT * FROM matakuliah WHERE idu = '$id' ORDER BY id_mk ASC") or die(mysql_error());
		
			$no = 1;	
			while($data1 = mysql_fetch_assoc($query1)){	
              $mk = $data1['id_mk'];  
              $dosen = $data1['idu'];  
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data1['kode_mk'].'</td>';	
					echo '<td>'.$data1['nama_mk'].'</td>';	
                
                  $qtugas = mysql_query("SELECT * FROM upload WHERE  idmk = '$mk' AND idu = '$dos' AND ujian = 'tugas'") or die(mysql_error()); 
                   $filedos = mysql_fetch_assoc($qtugas); 
                   $cek = mysql_num_rows($qtugas);
                   $idu = $filedos['idu'];
                if($cek >= 1){  echo '<td>sudah diupload</td>';	
                 }else{
                  echo '<form action="plut.php?idmk=' .$mk. '" method="post" enctype="multipart/form-data">';
                  echo '<td><input type="file" name="file" size="7"/><button type="submit" name="btn-upload" class="btn btn-default"><font size="2px">Upload</font></button></td>';
                   echo '</form>';
                }
                
                 $qkuis = mysql_query("SELECT * FROM upload WHERE  idmk = '$mk' AND idu = '$dos' AND ujian = 'kuis'") or die(mysql_error()); 
                   $filedos = mysql_fetch_assoc($qkuis); 
                   $cek = mysql_num_rows($qkuis);
                   $idu = $filedos['idu'];
                if($cek >= 1){  echo '<td>sudah diupload</td>';	
                 }else{
                  echo '<form action="plut.php?idmk=' .$mk. '" method="post" enctype="multipart/form-data">';
                  echo '<td><input type="file" name="file" /><button type="submit" name="btn-upload" class="btn btn-default"><font size="2px">Upload</font></button></td>';
                   echo '</form>';
                }
                
                $quts = mysql_query("SELECT * FROM upload WHERE  idmk = '$mk' AND idu = '$dos' AND ujian = 'uts'") or die(mysql_error()); 
                   $filedos = mysql_fetch_assoc($quts); 
                   $cek = mysql_num_rows($quts);
                   $idu = $filedos['idu'];
                if($cek >= 1){  echo '<td>sudah diupload</td>';	
                 }else{
                  echo '<form action="plut.php?idmk=' .$mk. '" method="post" enctype="multipart/form-data">';
                  echo '<td><input type="file" name="file" /><button type="submit" name="btn-upload" class="btn btn-default"><font size="2px">Upload</font></button></td>';
                   echo '</form>';
                }
                
                $quas = mysql_query("SELECT * FROM upload WHERE  idmk = '$mk' AND idu = '$dos' AND ujian = 'uas'") or die(mysql_error()); 
                   $filedos = mysql_fetch_assoc($quas); 
                   $cek = mysql_num_rows($quas);
                   $idu = $filedos['idu'];
                if($cek >= 1){  echo '<td>sudah diupload</td>';	
                 }else{
                  echo '<form action="plut.php?idmk=' .$mk. '" method="post" enctype="multipart/form-data">';
                  echo '<td><input type="file" name="file" /><button type="submit" name="btn-upload" class="btn btn-default"><font size="2px">Upload</font></button></td>';
                   echo '</form>';
                }
                
                
				echo '</tr>';
	             
				$no++;	
                 $sks = $data1['sks'];   
			 $jsks[] = $sks;
 	
			}
    
    
    
          ?>
        
                            
                            
                            
                            
                            
                            
                            
                            
                            
	
	 </tbody>
                             </table>
                           
                    </div>
                   </div>
                        
            </div>
            </div>
                 
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
