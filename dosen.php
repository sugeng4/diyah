<?php
@SESSION_start();
include "koneksi.php";

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
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data1['kode_mk'].'</td>';	
					echo '<td>'.$data1['nama_mk'].'</td>';	
                    echo '<td>'.$data1['sks'].'</td>';	
                    echo '<td>'.$data1['ruang'].'</td>';	
					echo '<td>'.$data1['hari'].'</td>';	
                    echo '<td>'.$data1['jam_ke'].'</td>';
                 
                    echo '<td>'.$data1['kelas'].'</td>';
                  
                
                    echo '<td>
                      <a href="soal.php?mk=' . $mk . '" class="label label-danger">Upload Soal</a> <br/>
                     <a href="jawab.php?mk=' . $mk . '" class="label label-warning">Unduh Jawaban</a> <br/>
                     <a href="ases.php?mk=' . $mk . '" class="label label-success">Penilaian</a> <br/>
                    
                    
                </td>';	
 
				echo '</tr>';
	             
				$no++;	
                 $sks = $data1['sks'];   
			 $jsks[] = $sks;
 				               
         if(isset($_POST['ok'])){
       
 if($_POST['aksi'] == '1'){      
      header("Location: soal.php?mk=' . $mk . '");
    echo '
        <script type="text/javascript">
 
   document.location="soal.php?mk=' . $mk . '";
   </script>
      ';
} else if($_POST['aksi'] == '2'){
     header("Location: jawab.php?mk=' . $mk . '");
    echo '
        <script type="text/javascript">
 
   document.location="jawab.php?mk=' . $mk . '";
   </script>
      ';
} else if($_POST['aksi'] == '3'){
     header("Location: ases.php?mk=' . $mk . '");
    echo '
        <script type="text/javascript">
  
   document.location="ases.php?mk=' . $mk . '";
   </script>
      ';
}
    }	       
                
                
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
