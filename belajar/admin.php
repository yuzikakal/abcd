<?php 
session_start();

    $server = "localhost";
	$user = "root";
	$password = "";
	$nama_database = "pendaftaran_siswa";

    $conn = mysqli_connect($server, $user, $password, $nama_database);
    $eror = "";

    if (isset($_SESSION["atmin"])) {
        header("location:dasbor3.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pass = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM etmin WHERE password = '$pass'");

        if (mysqli_num_rows($result) > 0) {
            $nilai = mysqli_fetch_array($result);
            $_SESSION["nama"] = $nilai["nama"];
            $_SESSION["atmin"] = true;
            $_SESSION["r"] = true;
            header("location:dasbor3.php");
            exit();
        }else {
            echo "<script>alert('Password salah');</script>";
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gradient-to-r from-sky-500 to-violet-500 font-serif text-2xl">
    <div class="flex flex-col p-20 w-full items-center mt-24">
        <p class="w-full md:w-1/2 pb-10 md:pb-3 text-center md:text-left">Masuk sebagai admin</p>
        <form action="admin.php" method="POST" class="mb-5 flex md:flex-row flex-col text-sm md:text-2xl w-full md:w-1/2 gap-3 ">
            <input name="password" id="pw" type="password" id="password" class="font-sans w-full shadow-sm  bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" placeholder="masukkan password" required />
            <section class="w-full md:w-1/2 pb-3 text-left text-lg flex gap-4 md:hidden"><input type="checkbox" class="tezt-lg" onclick="myFunction()">Lihat Password</section>
            <input type="submit" value="MASUK" class="text-white hover:shadow-xl hover:shadow-blue-600/50 bg-indigo-700 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg md:text-lg px-5 py-2.5 text-center">
        </form>
        <section class="w-full md:w-1/2 pb-3 text-left text-lg hidden md:flex gap-4"><input type="checkbox" class="tezt-lg" onclick="myFunction()">Lihat Password</section>
        <span class="border rounded-xl bg-slate-100 shadow-2xl flex flex-col text-lg flex-wrap gap-5 px-5 py-5 my-4">
            <p class="text-center">kembali ke <a href="index.php" class="text-blue-500 font-black">halaman utama</a></p>
        </span>
    </div>
    
    <script>
        function myFunction() {
    var x = document.getElementById("pw");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
    </script>
</body>
</html>