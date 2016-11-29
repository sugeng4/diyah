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
                       <h3>Penilaian </h3>
                        
                    	 <div class="table-responsive">
                    <table class="table no-margin" style="font-size:12px;">
                      <thead>
		<tr>
			<th>No.</th>
			<th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>Dosen Pengampu</th>
            <th>SKS</th>
            <th>Nilai Tugas</th>
            <th>Nilai Kuis</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
                    
		</tr>
                        </thead>
                        <tbody>
        <?php

     	$query1 = mysql_query("SELECT * FROM ambil_mk INNER JOIN matakuliah ON ambil_mk.id_mk = matakuliah.id_mk WHERE ambil_mk.idu = '$id' ORDER BY id_ambil ASC") or die(mysql_error());
		
     
           
    
			$no = 1;	
			while($data1 = mysql_fetch_assoc($query1)){	
                
        
               $idmk = $data1['id_mk'];
               $dmk = $data1['idu'];
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data1['kode_mk'].'</td>';	
					echo '<td>'.$data1['nama_mk'].'</td>';	
                  $query2 = mysql_query("SELECT * FROM dosen WHERE idu = $dmk") or die(mysql_error());
                $data2 = mysql_fetch_assoc($query2);
               $sks = $data1['sks'];
                    echo '<td>'.$data2['nama_dosen'].'</td>';
                    echo '<td>'.$data1['sks'].'</td>';
                	echo '<td>'.$data1['ntugas'].'</td>';	
                	echo '<td>'.$data1['nkuis'].'</td>';	
                	echo '<td>'.$data1['nuts'].'</td>';	
                	echo '<td>'.$data1['nuas'].'</td>';	
                $jum = ($data1['ntugas'] + 2 * $data1['nkuis'] + 3 * $data1['nuts'] + 4 * $data1['nuas'])/10;
                
                if($jum < 50){
                    $n = 'K'; $ip = 0 * $data1['sks'];
                }else if($jum >= 50 AND $jum < 60){
                    $n = 'E'; $ip = 0 * $data1['sks'];
                }else if($jum >= 60 AND $jum < 70){
                    $n = 'D'; $ip = 1 * $data1['sks'];
                }else if($jum >= 70 AND $jum < 80){
                    $n = 'C'; $ip = 2 * $data1['sks'];
                }else if($jum >= 80 AND $jum < 90){
                    $n = 'B'; $ip = 3 * $data1['sks'];
                }else if($jum >= 90 AND $jum < 101){
                    $n = 'A'; $ip = 4 * $data1['sks'];
                }
                	echo '<td>'.$n.'</td>';	

					
				echo '</tr>';
	             
				$no++;	
            $jsks[] = $sks;
            $jip[] = $ip;
			
			}
    
    @$jumip = array_sum($jip);
    @$jumsks = array_sum($jsks);
    
    if($jumsks == 0){
        $ips = 0;
    }else {
           $ips = $jumip / $jumsks;
    }
        ?>
        
	
	 </tbody>
                         </table>
                         </div>
              
                         <span class="label label-danger">IP Semester : <?php echo number_format($ips,2);?></span>     
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
