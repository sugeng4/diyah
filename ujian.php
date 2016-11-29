<?php
@SESSION_start();
include "koneksi.php";
$ujian = @$_GET['ujian'];
if($ujian == 'uts'){
    $uji = 'UTS';
}else{
     $uji = 'UAS';
}
if($_SESSION['mhsproject']){
 $user = $_SESSION['mhsproject'];   
    $panggil = mysql_query("SELECT * FROM user INNER JOIN tabel_mahasiswa ON tabel_mahasiswa.idu = user.idu WHERE user.idu = $user") or die(mysql_error());
    $datauser = mysql_fetch_assoc($panggil);
    $id = $datauser['idu'];
  
    $mhs = $datauser['nama_mahasiswa'];
    $nim = $datauser['nomor'];
    
    
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
                     <li><a href="
 <?php
 if(isset($_SESSION['adminproject'])){    
	echo 'admin.php">Input';   
}else if(isset($_SESSION['mhsproject'])){    
echo 'mhs.php">Dasbor';     
}
?>
                        </a></li>
                    <li><a href="sajian.php">Matakuliah</a></li>
                       <li><a href="ujian.php?ujian=uts">UTS</a></li>
                    <li><a href="ujian.php?ujian=uas">UAS</a></li>
                    <li><a href="nilai.php">KHS</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- NAVBAR CODE END -->
    <div class="container">
        <div class="row">
                <div class="col-md-12 text-center">
                    <h2><?php echo $mhs  ?></h2>

                   
               
                    <br />
                    <br />
                    
                </div>
            </div>
         <!-- USER PROFILE ROW STARTS-->
            <div class="row">
                <div class="col-md-2 col-sm-2">
                                       
                    <div class="user-wrapper">
                        <img src="assets/img/<?php echo $nim;?>.jpg" class="img-responsive" /> 
                    <div class="description">
                       <h5>NIM : <?php echo $nim ; ?> </h5>
                    </div>
                     </div>
                </div>
                
                <div class="col-md-10 col-sm-10  user-wrapper">
                    <div class="description">
                       <h3>Jadwal <?php 
    
    if(isset($ujian)){   
    echo $uji;
    }
                        
                           ?> </h3>
                        
                    	 <div class="table-responsive">
                    <table class="table no-margin" style="font-size:12px;">
                      <thead>
		<tr>
			<th>No.</th>
			<th>Tanggal</th>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>Dosen Pengampu</th>
            <th>File Soal</th>
            <th>File Jawaban</th>
            <th>Lakukan</th>
                    
		</tr>
                        </thead>
                        <tbody>
        <?php
	
 if($ujian == 'uts'){
  
		$query1 = mysql_query("SELECT * FROM ambil_mk INNER JOIN matakuliah ON ambil_mk.id_mk = matakuliah.id_mk WHERE ambil_mk.idu = '$id' ORDER BY uts ASC") or die(mysql_error());

}else{
     	$query1 = mysql_query("SELECT * FROM ambil_mk INNER JOIN matakuliah ON ambil_mk.id_mk = matakuliah.id_mk WHERE ambil_mk.idu = '$id' ORDER BY uas ASC") or die(mysql_error());
    
} 		
     
           
    
			$no = 1;	
			while($data1 = mysql_fetch_assoc($query1)){	
                 if($ujian == 'uts'){
                 $tgl = $data1['uts'];
                 }else{
                      $tgl = $data1['uas'];
                 }
        
               $idmk = $data1['id_mk'];
               $dmk = $data1['idu'];
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$tgl.'</td>';	
					echo '<td>'.$data1['kode_mk'].'</td>';	
					echo '<td>'.$data1['nama_mk'].'</td>';	
                  $query2 = mysql_query("SELECT * FROM dosen WHERE idu = $dmk") or die(mysql_error());
                $data2 = mysql_fetch_assoc($query2);
                    echo '<td>'.$data2['nama_dosen'].'</td>';
                
if($ujian == 'uts'){                
    $query3 = mysql_query("SELECT * FROM upload WHERE  idmk = '$idmk' AND idu = '$dmk' AND ujian = 'uts'") or die(mysql_error()); 
}else{
     $query3 = mysql_query("SELECT * FROM upload WHERE  idmk = '$idmk' AND idu = '$dmk'  AND ujian = 'uas'") or die(mysql_error()); 
}
                   $filedos = mysql_fetch_assoc($query3); 
                   $cek = mysql_num_rows($query3);
                   $idup = $filedos['id_up'];
                if($cek >= 1){  
                  if($ujian == 'uts'){   
                    $query4 = mysql_query("SELECT * FROM upload WHERE  idmk = '$idmk' AND idu = '$id' AND ujian = 'uts' ") or die(mysql_error()); 
                  }else{
                        $query4 = mysql_query("SELECT * FROM upload WHERE  idmk = '$idmk' AND idu = '$id' AND ujian = 'uas'") or die(mysql_error()); 
                  }
                    $filemhs = mysql_fetch_assoc($query4); 
                    $idup2 = $filemhs['id_up'];
                    $cek2 = mysql_num_rows( $query4);
                        if($cek2 >= 1){  
                            echo '<td><a href="download.php?idu=' .$idup. '"> <button class="btn btn-default"><font size="2px">Download</font></button></a></td>';
                            echo '<td>sudah diupload</td>';	
                            echo '<td><a href="hapus.php?idu=' .$idup2. '"> <button class="btn btn-default"><font size="2px">Hapus Jawaban</font></button></a></td>';
                        }else{
                   	        echo '<td><a href="download.php?idu=' .$idup. '"> <button class="btn btn-default"><font size="2px">Download</font></button></a></td>';
                          echo '<form action="plut.php?idmk=' .$idmk. '" method="post" enctype="multipart/form-data">';
                            echo '<td><input type="file" name="file" /></td>';
                            echo '<td> <button type="submit" name="btn-upload" class="btn btn-default"><font size="2px">Upload</font></button></td>';
                          echo '</form>';
                        }
                  }else{
                   echo '<td>belum ada</td>';	
                   echo '<td>---</td>';	
                   echo '<td>---</td>';
                  }
          
                           
                
                
                
                
                
                
                
					
				echo '</tr>';
	             
				$no++;	
                
			
			}
           
        ?>
        
	
	 </tbody>
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


<?php
     /*                  
@SESSION_start();
include "koneksi.php";
$ujian = @$_GET['ujian'];
if($ujian == 'uts'){
    $uji = 'UTS';
}else{
     $uji = 'UAS';
}
if($_SESSION['mhsproject']){
 $user = $_SESSION['mhsproject'];   
    $panggil = mysql_query("SELECT * FROM user INNER JOIN tabel_mahasiswa ON tabel_mahasiswa.idu = user.idu WHERE user.idu = $user") or die(mysql_error());
    $datauser = mysql_fetch_assoc($panggil);
    $id = $datauser['idm'];
 
    $mhs = $datauser['nama_mahasiswa'];
    $nim = $datauser['nomor'];
    
    
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
                <a class="navbar-brand" href="#">Sistem Pengambilan Matakuliah</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right  ">
                     <li><a href="
 <?php
 if(isset($_SESSION['adminproject'])){    
	echo 'admin.php">Input';   
}else if(isset($_SESSION['mhsproject'])){    
echo 'mhs.php">Dasbor';     
}
?>
                        </a></li>
                    <li><a href="sajian.php">Matakuliah</a></li>
                    <li><a href="ujian.php?ujian=uts">UTS</a></li>
                    <li><a href="ujian.php?ujian=uas">UAS</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- NAVBAR CODE END -->
    <div class="container">
        <div class="row">
                <div class="col-md-12 text-center">
                    <h2><?php echo $mhs  ?></h2>

                   
               
                    <br />
                    <br />
                    
                </div>
            </div>
         <!-- USER PROFILE ROW STARTS-->
            <div class="row">
                <div class="col-md-3 col-sm-3">
                                       
                    <div class="user-wrapper">
                        <img src="assets/img/<?php echo $nim;?>.jpg" class="img-responsive" /> 
                    <div class="description">
                       <h4>NIM : <?php echo $nim  ?> </h4>
                    </div>
                     </div>
                </div>
                
                <div class="col-md-9 col-sm-9  user-wrapper">
                     <div class="description">
                        
                        
                       <h3>Jadwal <?php 
    
    if(isset($ujian)){   
    echo $uji;
    }
                        
                           ?> </h3>
                        
                        
                        
                      <div class="table-responsive">
                
                
                 <table class="table no-margin" style="font-size:12px;">
                      <thead>
	
		
        <?php
		
  if(isset($ujian)){  
      echo '
      <tr>
			<th>No.</th>
            <th>Tanggal</th>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>Dosen</th>
            <th>File Soal</th>
            <th>File Jawaban</th>
            <th>Tindakan</th>
 
		</tr>
                        </thead><tbody>
      ';
		$query = mysql_query("SELECT * FROM jadwal INNER JOIN matakuliah ON jadwal.id_mk = matakuliah.id_mk WHERE kelas = '$kelas' AND ujian = '$ujian' ORDER BY tanggal ASC") or die(mysql_error());
	   
			$no = 1;	
			while($data = mysql_fetch_assoc($query)){	
              
              $tgl = $data['tanggal'];  
              $kode = $data['kode_mk'];  
              $nama = $data['nama_mk'];  
              $dos = $data['idu']; 
                  $idj = $data['idj'];
              $data3 = mysql_query("SELECT * FROM dosen WHERE  idu = '$dos'") or die(mysql_error()); 
                   $namdos = mysql_fetch_assoc($data3);     
                $namadosen = $namdos['nama_dosen'];
                
            
            
                  echo '<tr>';
					echo '<td>'. $no. '</td>';	
					echo '<td>'. $tgl. '</td>';	
					echo '<td>'. $kode. '</td>';	
                    echo '<td>'. $nama. '</td>';	
                    echo '<td>'. $namadosen. '</td>';	
             
                   $data1 = mysql_query("SELECT * FROM upload WHERE  idj = '$idj' AND uploader = '$dos' ") or die(mysql_error()); 
                   $filedos = mysql_fetch_assoc($data1); 
                   $cek = mysql_num_rows($data1);
                   $idu = $filedos['idu'];
                if($cek >= 1){  
                    $data2 = mysql_query("SELECT * FROM upload WHERE  idj = '$idj' AND uploader = '$nim' ") or die(mysql_error()); 
                    $filemhs = mysql_fetch_assoc($data2); 
                    $idu2 = $filemhs['idu'];
                    $cek2 = mysql_num_rows($data2);
                        if($cek2 >= 1){  
                            echo '<td><a href="download.php?idu=' .$idu2. '"> <button class="btn btn-default"><font size="2px">Download</font></button></a></td>';
                            echo '<td>sudah diupload</td>';	
                            echo '<td><a href="hapus.php?idu=' .$idu2. '"> <button class="btn btn-default"><font size="2px">Hapus Jawaban</font></button></a></td>';
                        }else{
                   	        echo '<td><a href="download.php?idu=' .$idu. '"> <button class="btn btn-default"><font size="2px">Download</font></button></a></td>';
                          echo '<form action="plut.php?idj=' .$idj. '" method="post" enctype="multipart/form-data">';
                            echo '<td><input type="file" name="file" /></td>';
                            echo '<td> <button type="submit" name="btn-upload" class="btn btn-default"><font size="2px">Upload</font></button></td>';
                          echo '</form>';
                        }
                  }else{
                   echo '<td>belum ada</td>';	
                   echo '<td></td>';	
                   echo '<td></td>';
                  }
          
                
                
                         
             
              
  
   echo '</tr>';
				$no++;	
			}
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
        */                 
                       
?>



























