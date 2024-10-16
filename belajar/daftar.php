<?php
session_start();
include("config.php");
//echo "<pre/>", print_r($_POST); 

if (isset($_SESSION['is_login'])) {
    header("location:dasbor.php");
    exit();
}

$error = "";

try {
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $asal = $_POST['asal'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tanggal'];
    $jenis_kel = $_POST['jenis_kelamin'];
    $rumah = $_POST['alamat'];
    $nomor = $_POST['nomor'];
    $agama = $_POST['agama'];
    $email = $_POST['email'];
    $nisn = $_POST['nisn'];
    $bid_study = $_POST['bid_study'];

    // buat query
    $sql = "INSERT INTO pendaftar (nama, asal, tempat, tanggal, jk, alamat, nomor, agama, email, nisn, bid_study) 
    VALUES ('$nama', '$asal', '$tempat', '$tanggal', '$jenis_kel', '$rumah', '$nomor', '$agama', '$email', '$nisn', '$bid_study')";
    
    if ($db->query($sql)) {
        session_start();
        $sql = "SELECT * FROM pendaftar WHERE email = '$email' AND nisn = '$nisn'";
        $result = mysqli_query($db, $sql);
    
        if($result->num_rows > 0) {
            $nilai = mysqli_fetch_array($result);
            $_SESSION["ID"] = $nilai["ID"];
            $_SESSION["nama"] = $nilai["nama"];
            $_SESSION["nisn"] = $nisn;
            $_SESSION["is_login"] = true;
            header("location:dasbor.php");
        }
    } else {
        //echo "data gagal masuk";
    }
} /*else {
    die("Connection error: " . mysqli_connect_error());

}*/

} catch (mysqli_sql_exception) {
   echo "<script>alert('NISN sudah terdaftar'); window.history.back();</script>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>daftar</title>
</head>
<body class="bg-gradient-to-r from-sky-500 to-violet-500">
    <div class="font-serif bg-scroll md:bg-gradient-to-r from-sky-500 to-violet-500 md:absolute md:bg-fixed box-border h-screen w-screen 
    flex flex-col sm:flex-row sm:bg-fixed">
        <div class="hidden md:block basis-1/2 container">
            <?php include "atas/navbar.html" ?>
        </div>
        <div class="basis-1/2 py-5 md:block md:box-border md:overflow-y-scroll">
            <div class="text-center py-5">
                <p class="text-xl text-white">Mulai Mendaftar</p>
            </div>
            <div class=" px-5 md:px-10 py-5 mx-auto">
                <form action="daftar.php" method="POST" class="border rounded-xl bg-slate-100 shadow-2xl flex flex-col flex-wrap gap-5 px-5 py-5 ">
                    <p>Nama Lengkap</p>
                    <input type="text" name="nama" placeholder="" id="" class="px-2 py-2 border-2 font-mono border-solid rounded-md border-gray-400" required>
                    <p>Asal Sekolah</p>
                    <input type="text" name="asal" placeholder="" id="" class="px-2 py-2 border-2 font-mono border-solid rounded-md border-gray-400" required>
                    Tempat Lahir
                    <input type="text" name="tempat" placeholder="" id="" class="px-2 py-2 border-2 font-mono border-solid rounded-md border-gray-400" required>
                    Tanggal Lahir
                    <input type="date" id="today" min="2007-01-01" name="tanggal" class="float-left w-full p-2 border-2 font-mono border-solid rounded-md border-gray-400" required>
                    Jenis Kelamin
                    <select name="jenis_kelamin" value="jk" class="float-left w-full p-2 border-2 font-mono border-solid rounded-md border-gray-400" required>
                        <option value=""></option>
                        <option>Laki Laki</option>
                        <option>Perempuan</option>
                    </select>
                    <!-- <p class="text-center">
                        <input type="radio" class="size-4" name="jenis_kelamin" value="laki-laki"><span class="px-2 text-xl md:text-2xl font-mono">Laki Laki</span>
                        <input type="radio" class="size-4" name="jenis_kelamin" value="perempuan"><span class="px-2 text-xl md:text-2xl font-mono">Perempuan</span>
                    </p> -->
                    <p>Alamat Rumah</p>
                    <input type="text" name="alamat" placeholder="" id="" class="px-2 py-2 border-2 font-mono border-solid rounded-md border-gray-400" required>
                    <p>Nomor Telepon</p>
                    <input type="number" name="nomor" placeholder="" id="" minlength="10" maxlength="13" class="px-2 py-2 border-2 font-mono border-solid rounded-md border-gray-400" required>
                    <p>Agama</p>
                    <select name="agama" value="agama" class="float-left w-full p-2 border-2 font-mono border-solid rounded-md border-gray-400" required>
                        <option value=""></option>
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                        <option>Konghucu</option>
                    </select>
                    <p>Email</p>
                    <input type="email" name="email" placeholder="" id="" class="px-2 py-2 border-2 font-mono border-solid rounded-md border-gray-400" required>
                    <p>NISN</p>
                    <!-- <h1 class="text-red-500 text-center text-xl"><?php //echo $error ?></h1> -->
                    <input type="number" name="nisn" placeholder="" id="" minlength="0" maxlength="10" class="px-2 py-2 border-2 font-mono border-solid rounded-md border-gray-400" required>
                    <p>Jurusan</p>
                    <select name="bid_study" value="jurusan" class="float-left text-grey-300 w-full p-2 border-2 font-mono border-solid rounded-md border-gray-400" required>
                        <option value=""></option>
                        <option>RPL</option>
                        <option>TKJ</option>
                        <option>DPIB</option>
                        <option>TKR</option>
                        <option>PH</option>
                        <option>TEI</option>
                        <option>TITL</option>
                    </select>
                    <input type="submit" class="py-2 mx-auto my-4 size-2/4 border-2 border-solid rounded-xl text-center bg-blue-600 text-white md:border-blue-400 md:bg-transparent md:text-blue-600
                    hover:bg-blue-500 hover:text-white hover:shadow-2xl hover:shadow-blue-500/50" name="daftar" value="DAFTAR" onclick="return confirm('Sudah yakin data sudah benar?'); window.history.back();">                   
                </form>
                <span class="border rounded-xl bg-slate-100 shadow-2xl flex flex-col flex-wrap gap-5 px-5 py-5 my-4">
                    <p class="text-center">Sudah memiliki akun? <a href="index.php" class="text-blue-500 font-black">Masuk Sekarang</a> </p>
                </span>
            </div>
        </div>
    </div>
    <script>today.max = new Date().toISOString().split("T")[0];</script>
</body>
</html>