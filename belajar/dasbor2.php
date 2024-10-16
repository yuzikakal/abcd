<?php 
session_start();
include("config.php");

if (!isset($_SESSION['is_login'])) {
    header("location:index.php");
    exit();
}
$id = $_SESSION["ID"] ;
$nisn = $_SESSION["nisn"];
$nama = $_SESSION["nama"];
$sql = "SELECT * FROM pendaftar WHERE ID = '$id'";
$result = mysqli_query($db, $sql);
$data = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>
<body class="bg-gradient-to-r from-sky-500 to-violet-500 font-serif">
    <div class="box-border h-full lg:h-screen w-screen flex flex-col lg:flex-row">
    <div class="lg:w-2/5 lg:h-full lg:relative ">
        <div class="text-left text-3xl justify-between lg:text-4xl px-10 py-8 lg:p-10 flex">
                <span class="flex flex-col gap-1 lg:gap-4">
                <p>Halo, <?=$nama ?></p>
                <p class="text-2xl lg:text-xl font-normal font-sans">NISN <?=$nisn ?></p>
                </span>
                <span class=""><img src="tutwuri.png" class="size-16 lg:size-20 lg:hidden"></span>
            </div>
            <div class="p-5 mx-10 my-5 hidden lg:my-0 lg:flex lg:flex-col lg:gap-16 overflow-auto bg-fixed rounded-md lg:bg-transparent justify-around lg:justify-between bg-slate-100 ">
            <form method="post" action="dasbor.php" class="m-0">
                <button class="lg:hover:bg-white lg:hover:border-white lg:hover:text-blue-700 px-4 py-2 lg:py-5 lg:text-2xl rounded-md w-full lg:border-2 lg:border-slate-100 bg-gradient-to-r from-orange-500 to-red-600  text-white text-center lg:bg-none">Informasi</button>            
            </form>
                <button type="submit" class="lg:hover:bg-white lg:hover:border-white lg:hover:text-blue-700 px-4 py-2 lg:py-5 lg:text-2xl rounded-md  lg:border-2 lg:border-slate-100 bg-gradient-to-r from-orange-500 to-red-600  text-white text-center lg:bg-none" >Detail Pribadi</button>
            </div>
            <a href="logout.php" class="hidden text-xl  lg:hover:bg-blue-700 absolute w-full bottom-0 text-white lg:flex items-center justify-center py-4" onclick="return confirm('Anda ingin keluar?');">Logout</a>
            
            
        </div>
        <div class="lg:w-full overflow-y-scroll">
            <h2 class="text-white text-lg p-4 lg:px-8 lg:py-6 lg:text-2xl">Detail Pribadi Anda</h2>
            <!-- tabel data -->
            <div class="bg-slate-100 mx-3 lg:mx-8 rounded-lg">
<div class="relative rounded-md p-2 lg:p-4 font-sans lg:mb-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <tbody class="lg:text-lg">
            <tr class="bg-slate-100">
                <th scope="row" class="lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Nama Lengkap
                </th>
                <td class="lg:px-6 py-4 text-right">
                <?=$data["nama"] ?>
                </td>
            </tr>
            <tr class="bg-slate-100">
                <th scope="row" class="lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Asal Sekolah
                </th>
                <td class="lg:px-6 py-4 text-right">
                <?=$data["asal"] ?>
                </td>
            </tr>
            <tr class="bg-slate-100">
                <th scope="row" class="lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Tempat/Tanggal Lahir
                </th>
                <td class="lg:px-6 py-4 text-right">
                <?=$data["tempat"] ?>, <?=$data["tanggal"] ?>
                </td>
            </tr>
            <tr class="bg-slate-100">
                <th scope="row" class="lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Jenis Kelamin
                </th>
                <td class="lg:px-6 py-4 text-right">
                <?=$data["jk"] ?>
                </td>
            </tr>
            <tr class="bg-slate-100">
                <th scope="row" class="lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Alamat Tempat Tinggal
                </th>
                <td class="lg:px-6 py-4 text-right">
                <?=$data["alamat"] ?>
                </td>
            </tr>
            <tr class="bg-slate-100">
                <th scope="row" class="lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Nomor Telepon
                </th>
                <td class="lg:px-6 py-4 text-right">
                <?=$data["nomor"] ?>
                </td>
            </tr>
            <tr class="bg-slate-100">
                <th scope="row" class="lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Agama
                </th>
                <td class="lg:px-6 py-4 text-right">
                <?=$data["agama"] ?>
                </td>
            </tr>
            <tr class="bg-slate-100">
                <th scope="row" class="lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Email
                </th>
                <td class="lg:px-6 py-4 text-right">
                <?=$data["email"] ?>
                </td>
            </tr>
            <tr class="bg-slate-100">
                <th scope="row" class="lg:px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Jurusan
                </th>
                <td class="lg:px-6 py-4 text-right">
                <?=$data["bid_study"] ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
            </div>
        </div>
            <div class="sticky bottom-4 p-5 mx-20 my-5 flex overflow-auto gap-5 bg-fixed rounded-md justify-around bg-slate-100 shadow-2xl lg:hidden">
                <a href="dasbor.php" class=" text-sm  text-blue-500 flex items-center justify-center ">Informasi</a>
                <a href="#" class=" text-sm  text-blue-500 flex items-center justify-center ">Detail Pribadi</a>
                <a href="logout.php" class=" text-sm  text-blue-500 flex items-center justify-center " onclick="return confirm('Anda ingin keluar?');">Logout</a>
            </div>
    </div>

    </body>
</html>