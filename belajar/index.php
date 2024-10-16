<?php
session_start();
include("config.php");

if (isset($_SESSION['is_login'])) {
    header("location:dasbor.php");
    exit();
}

$error = "";

if (isset($_POST['masuk'])) {
    $email = $_POST['email']; //ini sebenernya gk perlu wkwk
    $nisn = $_POST['nisn'];

    $sql = "SELECT * FROM pendaftar WHERE email = '$email' AND nisn = '$nisn'";
    $result = mysqli_query($db, $sql);

    
    if($result->num_rows > 0) {
        $nilai = mysqli_fetch_array($result);
        $_SESSION["ID"] = $nilai["ID"];
        $_SESSION["nama"] = $nilai["nama"];
        // $_SESSION["alamat"] = $nilai["alamat"];
        $_SESSION["nisn"] = $nisn;
        $_SESSION["is_login"] = true;
        header("location:dasbor.php");
    } elseif ($email == "a@dmin" && $nisn == "0") {
        header("location:admin.php");
    exit();
    } else{
        $error = "tolong masukkan data Anda dengan benar";
    }

} else {
   // error_reporting(E_ALL);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="bg-gradient-to-r from-sky-500 to-violet-500">
    <div class="font-serif bg-scroll box-border h-screen w-full 
    flex flex-col sm:flex-row sm:bg-fixed">
        <div class="basis-1/2 container">
            <?php include "atas/navbar.html" ?>
        </div>
        <div class="basis-1/2 py-5">
            <div class="text-center py-5">
                <p class="text-lg text-white">Masuk untuk informasi selengkapnya</p>
            </div>
            <div class="container px-5 md:px-10 py-5 mx-auto">
                <form action="index.php" method="POST" class="border rounded-xl bg-slate-100 shadow-2xl flex flex-col flex-wrap gap-5 px-5 py-5 ">
                    <p>Email</p>
                    <input type="email" class=" px-2 py-2 border-2 font-mono border-solid rounded-md border-gray-400" name="email" placeholder="Masukkan Email" id="" required>
                    <!-- <p class="hidden peer-invalid/niga:text-pink-600 peer-invalid/niga:block ">Email tidak valid</p> -->
                    <p>NISN</p>
                    <input type="number" minlength="0" maxlength="10" class="px-2 py-2 border-2 font-mono border-solid rounded-md border-gray-400" name="nisn" placeholder="Masukkan NISN" id="" required>
                    <!-- <p class="hidden peer-invalid/lmo:text-pink-600 peer-invalid/lmo:block ">Nom tidak valid</p> -->
                    <h1 class="text-red-500 text-center text-xl"><?php echo $error ?></h1>
                    <input type="submit" class="py-2 mx-auto my-4 size-2/4 border-2 border-solid rounded-xl text-center bg-blue-600 text-white md:border-blue-400 md:bg-transparent md:text-blue-600
                    hover:bg-blue-500 hover:text-white hover:shadow-2xl hover:shadow-blue-500/50" name="masuk" value="MASUK">
                </form>
                <span class="border rounded-xl bg-slate-100 shadow-2xl flex flex-col flex-wrap gap-5 px-5 py-5 my-4">
                    <p class="text-center">Tidak memiliki akun? <a href="daftar.php" class="text-blue-500 font-black">daftar sekarang</a></p>
                </span>
            </div>
        </div>
    </div>
</body>
</html>