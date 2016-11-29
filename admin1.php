<?php
@SESSION_start();
include "koneksi.php";
if($_SESSION['admin']){
	$user = $_SESSION['admin'];   
    $panggil = mysql_query("SELECT * FROM user WHERE id_user = $user") or die(mysql_error());
    $datauser = mysql_fetch_assoc($panggil);
    $id = $datauser['username'];
    ?>
	<!DOCTYPE html>
	<html>
	<head>
	<title>Latihan</title>
	</head>
	<body>
	<h2>Pengambilan Mata Kuliah </h2>
      <h3>Admin : <?php echo $id  ?>  | <a href="logout.php">Logout</a></h3>
      <h3>Tambahkan Mata Kuliah </h3>
	<table border="1">
        <form action="" method="post">
		<tr>
			<th>Kode MK</th>
            <td><input type="text" name="kodemk"></td>
        </tr>
        <tr>
            <th>Nama Mata Kuliah</th>
             <td><input type="text" name="namamk"></td>
         </tr>
        <tr>
            <th>SKS</th>
            <td><input type="text" name="sks"></td>
         </tr>
        <tr>
            <th>Ruang</th>
            <td><input type="text" name="ruang"></td>
         </tr>
        <tr>
            <th>Hari</th>
             <td><input type="text" name="hari"></td>
         </tr>
        <tr>
            <th>Jam ke-</th>
            <td><input type="text" name="jam"></td>
         </tr>
        <tr>
            <th>Kode Dosen</th>
            <td><input type="text" name="dosen"></td>
         </tr>
        <tr>
            <th>Kapasitas</th>
            <td><input type="text" name="kapasitas"></td>
         </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="tambah" value="Tambahkan"></td>
		</tr>
            </form>
        <?php
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
   document.location='admin.php';
   </script> ";
         } else  {
        echo "<script type='text/javascript'>
   document.location='admin.php';
   </script> ";
         }    
        }
        ?>
	</table>
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
            <th>Dosen</th>
            <th>Kapasitas</th>
            <th>Peminat</th>
            <th>Sisa Kapasitas</th>
            <th>Aksi</th>
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
                    echo '<td>'.$data['dosen_pengampu'].'</td>';
                $mk = $data['id_mk'];
                 $sqlmk = mysql_fetch_assoc(mysql_query("SELECT count(mhs) as peminat FROM ambil_mk WHERE mk = '$mk'")) or die (mysql_error());
                 $peminat = $sqlmk['peminat'];
                 $sisa = $data['kapasitas'] - $peminat;
           
                       echo '<td>' . $data['kapasitas'] . '</td>';	
                       echo '<td>' . $peminat . '</td>';	
                       echo '<td>' . $sisa . '</td>';	
                    echo '<td><a href="hapus.php?mk=' . $mk . '" >hapus</a>  </td>';	
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