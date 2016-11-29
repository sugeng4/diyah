 <?php
@SESSION_start();
    include('koneksi.php');
if(isset($_SESSION['dosenproject']) || isset($_SESSION['mhsproject'])){
 if(isset($_SESSION['dosenproject'])){
   $up = $_SESSION['dosenproject'];
} else if(isset($_SESSION['mhsproject'])){
  $up = $_SESSION['mhsproject'];
}  
   $idu = $_GET['idu'];
  $hapus = mysql_query("DELETE FROM upload WHERE id_up ='$idu'");
     if(isset($_SESSION['dosenproject'])){
   header ('location:dosen.php');
} else if(isset($_SESSION['mhsproject'])){
   header ('location:mhs.php');
}
    
}else if(isset($_SESSION['adminproject'])){
    include('koneksi.php');
 $user = $_SESSION['adminproject'];   
   $mk = $_GET['mk'];
  $hapus = mysql_query("DELETE FROM matakuliah WHERE id_mk ='$mk'");
        if($hapus){
        
        echo "<script type='text/javascript'>
        alert('Berhasil menghapus mata kuliah!');
   document.location='matakuliah.php';
   </script> ";
         } else  {
        echo "<script type='text/javascript'>
        alert('Gagal menghapus mata kuliah!');
   document.location='matakuliah.php';
   </script> ";
         }    
      
}
    
    ?>