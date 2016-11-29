 <?php
@SESSION_start();
    include('koneksi.php');
$user = $_SESSION['dosenproject'];   

if(isset($_POST['ambil'])){   
    $id = $_GET['ambil'];
                $tugas = $_POST['tugas'];
	            $kuis = $_POST['kuis'];
	            $uts = $_POST['uts'];
	            $uas = $_POST['uas'];
	 
     $editproses = mysql_query("UPDATE ambil_mk SET 
                ntugas = '$tugas',
	            nkuis = '$kuis',
	            nuts = '$uts',
	            nuas = '$uas'
	           WHERE id_ambil = $id" ) or die(mysql_error());
    
   $query = mysql_query("SELECT * FROM ambil_mk WHERE id_ambil = '$id'") or die(mysql_error());
	$data = mysql_fetch_assoc($query);
      $mk = $data['id_mk'];       
         
       if( $editproses){
	    echo '
        <script type="text/javascript">
   alert("Penilaian berhasil!");
   document.location="ases.php?mk=' . $mk . '";
   </script>
      ';
			
		}
         else{
			 echo '
        <script type="text/javascript">
   alert("Penilaian gagal!");
   document.location="ases.php?mk=' . $mk . '";
   </script>
      ';
		}   
     } 














    
    
    ?>