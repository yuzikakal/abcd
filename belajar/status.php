<?php

include("config.php");
if (isset($_POST["update"])) {
    $id = $_POST["ID"];
    $setatus = $_POST["setatus"];
    
    $kueri = "UPDATE pendaftar SET setatus = '$setatus' WHERE ID = '$id' ";

    if ($db->query($kueri)) {
        // header("location: dasbor4.php");
        echo "<script>alert('status telah diubah');</script>";
      }
      else { 
        echo "gk kueri le";
      }
      
} 

 ?>