<?php 
session_start();

if (!isset($_SESSION['atmin'])) {
    header("location:admin.php");
    exit();
}

    include("config.php");

    $id = $_GET['ide'];
    $sql = "DELETE FROM pendaftar WHERE ID = $id";

    if ($db->query($sql)) {
        echo "<script>alert('nig')</script>";
        header("location:dasbor3.php");
        exit();
    } else {
        echo "<script>alert('Gagal mengubah data');</script>";
    }

?>