 <?php
@SESSION_start();
    include('koneksi.php');
 $user = $_SESSION['mhsproject'];   
   $mk = $_GET['mk'];
  $batal = mysql_query("DELETE FROM ambil_mk WHERE mhs = '$user' AND mk ='$mk'");
        if($batal){
        
        echo "<script type='text/javascript'>
   document.location='mhs.php';
   </script> ";
         } else  {
        echo "<script type='text/javascript'>
   document.location='mhs.php';
   </script> ";
         }    
      
    
    
    ?>