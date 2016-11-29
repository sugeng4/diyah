<?php
@SESSION_start();
include "koneksi.php";

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
                     <li><a href="#home">Dasbor</a></li>
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
                       <h5>NIM : <?php echo $nim  ?> </h5>
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
            <th>SKS</th>
            <th>Ruang</th>
            <th>Hari</th>
            <th>Jam ke-</th>
         
            <th>Dosen Pengampu</th>
            <th>Lakukan</th>
                    
		</tr>
                        </thead>
                        <tbody>
        <?php
		//iclude file koneksi ke database
		include('koneksi.php');
		
		$query1 = mysql_query("SELECT * FROM ambil_mk WHERE idu = '$id' ORDER BY id_ambil ASC") or die(mysql_error());
		
			$no = 1;	
			while($data1 = mysql_fetch_assoc($query1)){	
              $dmk = $data1['id_mk'];
             $query2 = mysql_query("SELECT * FROM matakuliah INNER JOIN dosen ON matakuliah.idu = dosen.idu WHERE id_mk = $dmk") or die(mysql_error());
                $data2 = mysql_fetch_assoc($query2);
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data2['kode_mk'].'</td>';	
					echo '<td>'.$data2['nama_mk'].'</td>';	
                    echo '<td>'.$data2['sks'].'</td>';	
                    echo '<td>'.$data2['ruang'].'</td>';	
					echo '<td>'.$data2['hari'].'</td>';	
                    echo '<td>'.$data2['jam_ke'].'</td>';
                 
                    echo '<td>'.$data2['nama_dosen'].'</td>';
                   $mk = $data2['id_mk'];
                    echo '<td><a href="batal.php?mk=' . $mk . '" ><span class="label label-danger">Batal</span></a>  </td>';	
					
					
				//	echo '<td><a href="" >Hitung</a> | <a href="">Edit</a> </td>';	
				echo '</tr>';
	             
				$no++;	
                 $sks = $data2['sks'];   
			 $jsks[] = $sks;
			}
           	echo '<tr >';
           	echo '</tr >';
           	echo '<tr >';
					echo '<td colspan="3">Jumlah SKS</td>';	
				@$jumsks = array_sum($jsks);		
                    echo '<td>'.$jumsks.'</td>';	
                    echo '<td></td>';	
					echo '<td></td>';	
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
              
				echo '</tr>';
        ?>
        
	
	 </tbody>
                             </table>
                             
                             <div>
                 <a class="btn btn-primary" href="cetak.php" >Cetak KRS</a>
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
