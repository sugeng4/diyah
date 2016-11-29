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
                     <li><a href="tugas.php">Tugas</a></li>
                     <li><a href="kuis.php">Kuis</a></li>
                     <li><a href="uts.php">UTS</a></li>
                     <li><a href="uas.php">UAS</a></li>
                  
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
            <?php
        $query0 = mysql_query("SELECT * FROM matakuliah WHERE id_mk = '$mk'") or die(mysql_error());
	$data0 = mysql_fetch_assoc($query0);	
    
        ?>
                <div class="col-md-10 col-sm-10  user-wrapper">
                    <div class="description">
                         <h4>Penilaian : <?php echo  $data0['nama_mk'] . ' | Kelas ' . $data0['kelas']; ?></h4><hr/>
                    	 <div class="table-responsive">
                    <table class="table no-margin" style="font-size:12px;">
                      <thead>
		<tr>
			<th>No.</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Nilai Tugas</th>
            <th>Nilai Kuis</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Lakukan</th>
                    
		</tr>
                        </thead>
                        <tbody>
        <?php
		//iclude file koneksi ke database
		include('koneksi.php');
		
		$query1 = mysql_query("SELECT * FROM ambil_mk INNER JOIN tabel_mahasiswa ON ambil_mk.idu = tabel_mahasiswa.idu WHERE id_mk = '$mk' ORDER BY id_mk ASC") or die(mysql_error());
		  
    
			$no = 1;	
			while($data1 = mysql_fetch_assoc($query1)){	
              $idu = $data1['idu'];
                 $query2 = mysql_query("SELECT * FROM user WHERE idu = $idu") or die(mysql_error());
                   $data2 = mysql_fetch_assoc($query2);
                    
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data2['nomor'].'</td>';	
					echo '<td>'.$data1['nama_mahasiswa'].'</td>';	
                 $idambil = $data1['id_ambil'];
                  $tugas = $data1['ntugas'];
	            $kuis = $data1['nkuis'];
	            $uts = $data1['nuts'];
	            $uas = $data1['nuas'];
                
                echo '<form method="post" action="edit.php?ambil=' . $idambil . '">';
					echo '<td><input type="text" name="tugas"  value=" ' . $tugas . '" size="5"/></td>';	
                    echo '<td><input type="text" name="kuis" value=" ' . $kuis . '" size="5"/></td>';	
                    echo '<td><input type="text" name="uts" value=" ' . $uts . '" size="5"/></td>';	
					echo '<td><input type="text" name="uas" value=" ' . $uas . '" size="5"/></td>';	
                 echo '<td><input type="submit" name="ambil" value="Kirim" > </td>';
                 echo '</form>';  
           
				echo '</tr>';
	             
				$no++;	
               
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
