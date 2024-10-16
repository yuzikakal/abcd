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
    <div class="box-border h-screen w-screen flex flex-col lg:flex-row">
        <div class=" lg:w-2/5 lg:h-full lg:relative  ">
            <div class="text-left text-3xl justify-between lg:text-4xl px-10 py-8 lg:p-10 flex">
                <span class="flex flex-col gap-1 lg:gap-4">
                <p>Halo, <?=$nama ?></p>
                <p class="text-2xl lg:text-xl font-normal font-sans">NISN <?=$nisn ?></p>
                </span>
                <span class=""><img src="tutwuri.png" class="size-16 lg:size-20 lg:hidden"></span>
            </div>
            <div class="p-5 mx-10 my-5 hidden lg:my-0 lg:flex lg:flex-col lg:gap-16 overflow-auto bg-fixed rounded-md lg:bg-transparent justify-around lg:justify-between bg-slate-100 ">
                <button class="lg:hover:bg-white lg:hover:border-white lg:hover:text-blue-700 px-4 py-2 lg:py-5 lg:text-2xl rounded-md lg:border-2 lg:border-slate-100 bg-gradient-to-r from-orange-500 to-red-600  text-white text-center lg:bg-none">Informasi</button>
            <form method="post" action="dasbor2.php" class="m-0">
                <button type="submit" class="lg:hover:bg-white lg:hover:border-white lg:hover:text-blue-700 px-4 py-2 lg:py-5 lg:text-2xl rounded-md w-full lg:border-2 lg:border-slate-100 bg-gradient-to-r from-orange-500 to-red-600  text-white text-center lg:bg-none" >Detail Pribadi</button>
            </form>
            </div>
            <a href="logout.php" class="hidden text-xl  lg:hover:bg-blue-700 absolute w-full bottom-0 text-white lg:flex items-center justify-center py-4" onclick="return confirm('Anda ingin keluar?');">Logout</a>    
        </div>
        <div class="lg:w-full h-full">
            <div> 
                <div class="flex p-5 items-start gap-2.5">
                    <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse font-sans">
                            <!-- <span class="text-sm font-semibold text-gray-900 dark:text-white">Admin</span> -->
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"><?=$data["tgl_daftar"] ?></span>
                        </div>
                        <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">Pendaftaran Berhasil</p>
                        <!-- <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span> -->
                    </div> 
                </div>
                <div class="flex p-5 items-start gap-2.5">
                    <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse font-sans">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"><?=$data["tgl_daftar"] ?></span>
                        </div>
                        <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">Harap menunggu informasi status pendaftaran anda</p>
                    </div> 
                </div>
                <?php include("buble.php");?>
            </div>
        </div>
        <div class="sticky bottom-4 p-5 mx-20 my-5 flex overflow-auto gap-5 bg-fixed rounded-md justify-around bg-slate-100 shadow-2xl lg:hidden">
                <a href="#" class=" text-sm  text-blue-500 flex items-center justify-center ">Informasi</a>
                <a href="dasbor2.php" class=" text-sm  text-blue-500 flex items-center justify-center ">Detail Pribadi</a>
                <a href="logout.php" class=" text-sm  text-blue-500 flex items-center justify-center " onclick="return confirm('Anda ingin keluar?');">Logout</a>
            </div>
    </div>

    </body>
</html>