 <?php
@SESSION_start();
include "koneksi.php";
 $user = $_SESSION['mhsproject'];   
   $mk = $_GET['mk'];

 
   $ambil = mysql_query("insert into ambil_mk values('', '$user', '$mk', '0', '0', '0', '0')")or die(mysql_error());
        if($ambil){
        
        echo "<script type='text/javascript'>
   document.location='mhs.php';
   </script> ";
         } else  {
        echo "<script type='text/javascript'>
   document.location='mhs.php';
   </script> ";
         }    
      
    
    
    ?>