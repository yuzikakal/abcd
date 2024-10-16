<?php 
session_start();

if (!isset($_SESSION['atmin'])) {
    header("location:admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>Dashboard Admin</title>
</head>
<body class="bg-white">
    <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10 sm:px-6 w-full ">
    <?php include("atas/navadmin.php") ?>
    <?php include("update.php") ?>
    </div>


</body>
</html>