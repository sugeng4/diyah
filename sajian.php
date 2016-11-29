<?php
@SESSION_start();
include "koneksi.php";
if(isset($_SESSION['adminproject']) || isset($_SESSION['mhsproject'])){
if(isset($_SESSION['adminproject'])){    
	$user = $_SESSION['adminproject'];   
}else if(isset($_SESSION['mhsproject'])){    
	$user = $_SESSION['mhsproject'];   
}
    $panggil = mysql_query("SELECT * FROM user INNER JOIN tabel_mahasiswa ON tabel_mahasiswa.idu = user.idu WHERE user.idu = $user") or die(mysql_error());
    $datauser = mysql_fetch_assoc($panggil);
    $id = $datauser['idu'];
     $mhs = $datauser['nama_mahasiswa'];
     $panggil1 = mysql_query("SELECT * FROM user WHERE idu = $user") or die(mysql_error());
    $datauser1 = mysql_fetch_assoc($panggil1);
    $adm = $datauser1['nomor'];
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
                <a class="navbar-brand" href="#">Sedang Aktif : <?php echo $mhs  ?></a>
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
       
         <!-- USER PROFILE ROW STARTS-->
            <div class="row">  
                <div class="user-wrapper">
                    <div class="description">
                       <h3>Sajian Mata Kuliah </h3>
 <div class="table-responsive">
                    <table class="table no-margin" style="font-size:12px;">
                      <thead>
	
		<tr>
			<th>No.</th>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Ruang</th>
            <th>Hari</th>
            <th>Jam ke-</th>
            <th>Dosen</th>
            <th>Kapasitas</th>
            <th>Peminat</th>
            <th>Sisa</th>
            <th>Aksi</th>
            <th>Ket</th>
		</tr>
                        </thead><tbody>
        <?php
		//iclude file koneksi ke database
		include('koneksi.php');
		
		$query = mysql_query("SELECT * FROM matakuliah INNER JOIN dosen ON matakuliah.idu = dosen.idu ORDER BY id_mk ASC") or die(mysql_error());
	
			$no = 1;	
			while($data = mysql_fetch_assoc($query)){	
             
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data['kode_mk'].'</td>';	
					echo '<td>'.$data['nama_mk'].'</td>';	
                    echo '<td>'.$data['sks'].'</td>';	
                    echo '<td>'.$data['ruang'].'</td>';	
					echo '<td>'.$data['hari'].'</td>';	
                    echo '<td>'.$data['jam_ke'].'</td>';
                    echo '<td>'.$data['nama_dosen'].'</td>';
                $mk = $data['id_mk'];
                 
                 $sqlmk = mysql_fetch_assoc(mysql_query("SELECT count(idu) as peminat FROM ambil_mk WHERE id_mk = '$mk'")) or die (mysql_error());
                 $peminat = $sqlmk['peminat'];
                 $sisa = $data['kapasitas'] - $peminat;
              echo '<td>' . $data['kapasitas'] . '</td>';	
                       echo '<td>' . $peminat . '</td>';	
                       echo '<td>' . $sisa . '</td>';	
               
 if(isset($_SESSION['adminproject'])){    
	     echo '<td>
         <a href="admin.php?mk=' . $mk . '" >Edit</a>  <br/>
         <a href="hapus.php?mk=' . $mk . '" onclick="return confirm(\'Yakin menghapus matakuliah?\')">hapus</a>  
         </td>';	
                
 }else if(isset($_SESSION['mhsproject'])){    
             $sqlmks = mysql_query("SELECT * FROM ambil_mk WHERE idu = '$id' AND id_mk = '$mk'") or die (mysql_error());    
            
           $cek = mysql_num_rows($sqlmks);
            if($cek >= 1){
                
                if($sisa == 0){
                  echo '<td><font color="blue">Penuh </font> </td>';	
                }else{ 
                   echo '<td><span class="label label-danger">Ambil</span> </td>';	  
                }  
                  
                    echo '<td>Sudah diambil </td>';	
                  
            }else{                
                  
                if($sisa == 0){
                  
                   echo '<td><font color="blue">Penuh </font> </td>';	
                    echo '<td><font color="red">Tidak diambil</font> </td>'; 
                }else{ 
                   echo '<td><a href="ambil.php?mk=' . $mk . '" ><span class="label label-success">Ambil</span></a>  </td>';
                    echo '<td> </td>';   
                }  
                
                
          }
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