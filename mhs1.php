<?php
@SESSION_start();
include "koneksi.php";

if($_SESSION['mhs']){
 $user = $_SESSION['mhs'];   
    $panggil = mysql_query("SELECT * FROM user INNER JOIN mahasiswa ON mahasiswa.nim = user.kode WHERE user.id_user = $user") or die(mysql_error());
    $datauser = mysql_fetch_assoc($panggil);
    $id = $datauser['id_user'];
    $mhs = $datauser['nama'];
    
    
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Latihan</title>
</head>
<body>
	<h2>Pengambilan Mata Kuliah </h2>
	
	
	<h3>Sajian Mata Kuliah </h3>

	<table border="1">
		<tr>
			<th>No.</th>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Ruang</th>
            <th>Hari</th>
            <th>Jam ke-</th>
            <th>Kode Dosen</th>
            <th>Dosen Pengampu</th>
            <th>Kapasitas</th>
            <th>Sisa Kapasitas</th>
            <th>Lakukan</th>
            <th>Keterangan</th>
            
                    
		</tr>
		
        <?php
		//iclude file koneksi ke database
		include('koneksi.php');
		
		$query = mysql_query("SELECT * FROM matakuliah INNER JOIN dosen ON matakuliah.kode_dos = dosen.kode_dos ORDER BY id_mk ASC") or die(mysql_error());
	
	
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
                    echo '<td>'.$data['kode_dos'].'</td>';
                    echo '<td>'.$data['dosen_pengampu'].'</td>';
                    echo '<td>'.$data['kapasitas'].'</td>';
                $mk = $data['id_mk'];
                 $sqlmk = mysql_query("SELECT * FROM ambil_mk WHERE mhs = '$id' AND mk = '$mk'") or die (mysql_error());
                $sqlmks = mysql_fetch_assoc(mysql_query("SELECT count(mhs) as peminat FROM ambil_mk WHERE mk = '$mk'")) or die (mysql_error());
                 $peminat = $sqlmks['peminat'];
                 $sisa = $data['kapasitas'] - $peminat;
                    
              echo '<td>'.$sisa.'</td>';
           $cek = mysql_num_rows($sqlmk);
            if($cek >= 1){
                    echo '<td><a>Sudah diambil</a>  </td>';	
            }else{
                
                     echo '<td><a href="ambil.php?mk=' . $mk . '" >Ambil</a>  </td>';
               
            }
			 if($sisa == 0){
                 echo '<td><a>Penuh</a>  </td>';	
                } else{
                     echo '<td> </td>';
                }
                
                
				echo '</tr>';
	             
				$no++;	
                
			
			}
           
       
    
    
        ?>
        
	
	</table>
  
    <h3><?php echo $mhs  ?>  | <a href="logout.php">Logout</a></h3>

	<table border="1">
		<tr>
			<th>No.</th>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Ruang</th>
            <th>Hari</th>
            <th>Jam ke-</th>
            <th>Kode Dosen</th>
            <th>Dosen Pengampu</th>
            <th>Lakukan</th>
                    
		</tr>
		
        <?php
		//iclude file koneksi ke database
		include('koneksi.php');
		
		$query1 = mysql_query("SELECT * FROM ambil_mk WHERE mhs = '$id' ORDER BY id_ambil ASC") or die(mysql_error());
	
    
    
    
	
			$no = 1;	
			while($data1 = mysql_fetch_assoc($query1)){	
              $dmk = $data1['mk'];
             $query2 = mysql_query("SELECT * FROM matakuliah INNER JOIN dosen ON matakuliah.kode_dos = dosen.kode_dos WHERE id_mk = $dmk") or die(mysql_error());
                $data2 = mysql_fetch_assoc($query2);
				echo '<tr>';
					echo '<td>'.$no.'</td>';	
					echo '<td>'.$data2['kode_mk'].'</td>';	
					echo '<td>'.$data2['nama_mk'].'</td>';	
                    echo '<td>'.$data2['sks'].'</td>';	
                    echo '<td>'.$data2['ruang'].'</td>';	
					echo '<td>'.$data2['hari'].'</td>';	
                    echo '<td>'.$data2['jam_ke'].'</td>';
                    echo '<td>'.$data2['kode_dos'].'</td>';
                    echo '<td>'.$data2['dosen_pengampu'].'</td>';
                   $mk = $data2['id_mk'];
                    echo '<td><a href="batal.php?mk=' . $mk . '" >Batal</a>  </td>';	
					
					
				//	echo '<td><a href="" >Hitung</a> | <a href="">Edit</a> </td>';	
				echo '</tr>';
	             
				$no++;	
                
			
			}
           
        ?>
        
	
	</table>
        
    
</body>
</html>
<?php
} else {
    header("location: index.php");
}
?>