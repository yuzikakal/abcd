<?php
include("config.php");
session_start();

if (!isset($_SESSION['atmin'])) {
    header("location:admin.php");
    exit();
}

// $error = "";
// if (isset($_SESSION["atmin"])) {
//     header("location:dasbor3.php");
//     exit();
// }

try {
if(isset($_POST['daftar'])){

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
        echo "<script>alert('Data Siswa sudah ditambahkan');</script>";
        header("location:dasbor3.php");
        } else {
        echo "data gagal masuk";
        
    }
}
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
    <title>tambah data siswa</title>
</head>
<body class="bg-gradient-to-r from-sky-500 to-violet-500">
    <div class="font-serif bg-scroll md:bg-gradient-to-r from-sky-500 to-violet-500 md:absolute md:bg-fixed box-border h-screen w-screen 
    flex flex-col sm:flex-row sm:bg-fixed md:justify-center md:overflow-y-scroll">
        <!-- <div class="hidden md:block basis-1/2 container">
            <?php 
            // include "atas/navbar.html"
             ?>
        </div> -->
        <div class="w-full md:w-2/3 md:py-5 md:block md:box-border ">
            <div class="text-center py-5">
                <p class="text-xl text-white">Tambahkan Siswa Baru</p>
            </div>
            <div class=" px-5 md:px-10 py-5 mx-auto">
                <form action="tambah.php" method="POST" class="border rounded-xl bg-slate-100 shadow-2xl flex flex-col flex-wrap gap-5 px-5 py-5 ">
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
                    <div class="flex flex-row gap-3">
                    <input type="submit" class="py-2 mx-auto my-4 size-2/3 border-2 border-solid rounded-xl text-center bg-blue-600 text-white md:border-blue-400 md:bg-transparent md:text-blue-600
                    hover:bg-blue-500 hover:text-white hover:shadow-2xl hover:shadow-blue-500/50" name="daftar" value="TAMBAHKAN" onclick="return confirm('Sudah yakin data sudah benar?'); window.history.back(); alert('Data Siswa sudah ditambahkan');">
                    <input type="button" class="py-2 mx-auto my-4 size-1/3 border-2 border-solid rounded-xl text-center bg-red-600 text-white md:border-red-400 md:bg-transparent md:text-red-600
                    hover:bg-red-500 hover:text-white hover:shadow-2xl hover:shadow-red-500/50" value="KEMBALI" onclick="history.back();">                   
                
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>today.max = new Date().toISOString().split("T")[0];</script>
</body>
</html>