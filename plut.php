<?php
@SESSION_start();
include"koneksi.php";
$idmk = $_GET['idmk'];
if(isset($_SESSION['dosenproject'])){
   $idup = $_SESSION['dosenproject'];
} else if(isset($_SESSION['mhsproject'])){
  $idup = $_SESSION['mhsproject'];
}
$date = date('d-M-Y H:i:s');

if(isset($_POST['btn-upload'])){    
         
 $file = $_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="file";
 move_uploaded_file($file_loc,$folder.$file);
    
    
    
    $show = mysql_query("SELECT *  FROM upload WHERE file = '$file' ");
              
                 $cek = mysql_num_rows($show);
            if($cek >= 1){
                 echo "<script type='text/javascript'>
                                      alert('Sepertinya file ini sudah pernah diupload. Ganti dengan nama file lain!');";
                                      
                                      if(isset($_SESSION['dosenproject'])){
  echo "

                                       document.location='dosen.php';";
} else if(isset($_SESSION['mhsproject'])){
   echo "

                                       document.location='mhs.php';";
}
echo "

                                     </script> ";
            } else{
 $sql="INSERT INTO upload VALUES('','$idmk','$idup','uts','$file','$date')";
 mysql_query($sql); 
    
            }
    
    
}

if(isset($_SESSION['dosenproject'])){
   header ('location:dosen.php');
} else if(isset($_SESSION['mhsproject'])){
   header ('location:mhs.php');
}


?>