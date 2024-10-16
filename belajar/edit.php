<?php 
session_start();

if (!isset($_SESSION['atmin'])) {
    header("location:admin.php");
    exit();
}

    include("config.php");
    

    $id = $_GET['ide'];
    $sql = "SELECT * FROM pendaftar WHERE   ID = '$id'"; 
    $result = mysqli_query($db, $sql);
    $data = mysqli_fetch_array($result);
    
    if(isset($_POST['ubah'])){

      // ambil data dari formulir 
      
      $nama = $_POST['nama'];
      $asal = $_POST['asal'];
      $tempat = $_POST['tempat'];
      $tanggal = $_POST['tanggal'];
      $jk = $_POST['jk'];
      $rumah = $_POST['alamat'];
      $nomor = $_POST['nomor'];
      $agama = $_POST['agama'];
      $email = $_POST['email'];
      $nisn = $_POST['nisn'];
      $bid_study = $_POST['bid_study'];
      // $setatus = $_POST['setatus'];

      $quer = "UPDATE pendaftar SET nama = '$nama', asal = '$asal', tempat = '$tempat', tanggal = '$tanggal',
      jk = '$jk', alamat = '$rumah', nomor = '$nomor', agama = '$agama', email = '$email', bid_study = '$bid_study',
      nisn = '$nisn', setatus = '$setatus' WHERE ID = '$id' ";
    
    if ($db->query($quer)) {
      header ("location:dasbor3.php");
    }
    else { 
      echo "k";
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
<body class="bg-gradient-to-r from-sky-500 to-violet-500 font-serif">
    <div class="py-8">
        <!-- component -->
<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<div class="isolate px-6 py-3 md:py-5 lg:px-8">
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Edit data siswa</h2>
    <p class="mt-2 text-lg leading-8 text-gray-600"></p>
  </div>
  <form action="" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      <div class="sm:col-span-2">
        <label for="nama" class="block text-sm font-semibold leading-6 text-black">Nama Lengkap</label>
        <div class="mt-2.5">
          <input type="text" name="nama" value="<?=$data['nama'] ?>" id="nama" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6" required>
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="asal" class="block text-sm font-semibold leading-6 text-black">Asal Sekolah</label>
        <div class="mt-2.5">
          <input type="text" name="asal" value="<?=$data['asal'] ?>" id="asal" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6" required>
        </div>
      </div>
      <div>
        <label for="tmp" class="block text-sm font-semibold leading-6 text-black">Tempat Lahir</label>
        <div class="mt-2.5">
          <input type="text" name="tempat" value="<?=$data['tempat'] ?>" id="tmp" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm shadow-blue-500 ring-1 ring-inset ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6" required>
        </div>
      </div>
      <div>
        <label for="tgl" class="block text-sm font-semibold leading-6 text-black">Tanggal Lahir</label>
        <div class="mt-2.5">
          <input type="date" name="tanggal" value="<?=$data['tanggal'] ?>" id="tgl" autocomplete="family-name" class="font-mono block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6 " required>
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="jk" class="block text-sm font-semibold leading-6 text-black">Jenis Kelamin</label>
        <div class="mt-2.5">
          <select name="jk" id="jk" class="block w-full rounded-md border-0 px-3.5 py-3 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
          <?php
            if ($data['jk'] == "Laki Laki") echo "<option value='Laki Laki' selected>Laki Laki</option>";
            else echo "<option value='Laki Laki'>Laki Laki</option>"; ?>
          <?php
            if ($data['jk'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
            else echo "<option value='Perempuan'>Perempuan</option>"; ?>
          </select>
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="alamat" class="block text-sm font-semibold leading-6 text-black">Alamat</label>
        <div class="mt-2.5">
          <input type="text" name="alamat" value="<?=$data['alamat'] ?>" id="alamat" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6" required>
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="nomor" class="block text-sm font-semibold leading-6 text-black">Nomor Telepon</label>
        <div class="mt-2.5">
          <input type="number" name="nomor" value="<?=$data['nomor'] ?>" id="nomor" autocomplete="organization" class="font-mono block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6" required>
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="agama" class="block text-sm font-semibold leading-6 text-black">Agama</label>
        <div class="mt-2.5">
          <select name="agama" id="agama" class="block w-full rounded-md border-0 px-3.5 py-3 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
            <?php
            if ($data['agama'] == "Islam") echo "<option value='Islam' selected>Islam</option>";
            else echo "<option>Islam</option>"; ?>
            <?php
            if ($data['agama'] == "Kristen") echo "<option value='Kristen' selected>Kristen</option>";
            else echo "<option>Kristen</option>"; ?>
            <?php
            if ($data['agama'] == "Hindu") echo "<option value='Hindu' selected>Hindu</option>";
            else echo "<option>Hindu</option>"; ?>
            <?php
            if ($data['agama'] == "Budha") echo "<option value='Budha' selected>Budha</option>";
            else echo "<option>Budha</option>"; ?>
            <?php
            if ($data['agama'] == "Konghucu") echo "<option value='Konghucu' selected>Konghucu</option>";
            else echo "<option>Konghucu</option>"; ?>
          </select>
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="email" class="block text-sm font-semibold leading-6 text-black">Email</label>
        <div class="mt-2.5">
          <input type="text" name="email" value="<?=$data['email'] ?>" id="email" autocomplete="organization" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6" required>
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="nisn" class="block text-sm font-semibold leading-6 text-black">NISN</label>
        <div class="mt-2.5">
          <input type="number" name="nisn" value="<?=$data['nisn'] ?>" id="nisn" autocomplete="organization" class="font-mono block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6" required>
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="jurusan" class="block text-sm font-semibold leading-6 text-black">Jurusan</label>
        <div class="mt-2.5">
          <select name="bid_study" id="jurusan" class="block w-full rounded-md border-0 px-3.5 py-3 text-gray-900 shadow-sm ring-1 ring-inset shadow-blue-500 ring-blue-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-400 sm:text-sm sm:leading-6">
            <?php
            if ($data['bid_study'] == "RPL") echo "<option value='RPL' selected>RPL</option>";
            else echo "<option>RPL</option>"; ?>
            <?php
            if ($data['bid_study'] == "TKJ") echo "<option value='TKJ' selected>TKJ</option>";
            else echo "<option>TKJ</option>"; ?>
            <?php
            if ($data['bid_study'] == "DPIB") echo "<option value='DPIB' selected>DPIB</option>";
            else echo "<option>DPIB</option>"; ?>
            <?php
            if ($data['bid_study'] == "TKR") echo "<option value='TKR' selected>TKR</option>";
            else echo "<option>TKR</option>"; ?>
            <?php
            if ($data['bid_study'] == "PH") echo "<option value='PH' selected>PH</option>";
            else echo "<option>PH</option>"; ?>
            <?php
            if ($data['bid_study'] == "TEI") echo "<option value='TRI' selected>TEI</option>";
            else echo "<option>TEI</option>"; ?>
            <?php
            if ($data['bid_study'] == "TITL") echo "<option value='TITL' selected>TITL</option>";
            else echo "<option>TITL</option>"; ?>
          </select>
        </div>
      </div>
      <!-- <select name="setatus" class="bg-transparent">
                            <?php
                            // if ($data['setatus'] == "ditangguhkan") echo "<option selected>ditangguhkan</option>";
                            // else echo "<option>ditangguhkan</option>"; ?>
                            <?php
                            // if ($data['setatus'] == "diterima") echo "<option selected>diterima</option>";
                            // else echo "<option>diterima</option>"; ?>
                            <?php
                            // if ($data['setatus'] == "ditolak") echo "<option selected>ditolak</option>";
                            // else echo "<option>ditolak</option>"; ?>
                        </select> -->
    <div class="col-span-2 border rounded-xl bg-slate-100 shadow-2xl flex flex-col flex-wrap gap-5 ">
      <input type="submit" class="py-2 mx-auto my-5 size-2/4 border-2 border-solid rounded-xl text-center bg-blue-600 text-white md:border-blue-400 md:bg-transparent md:text-blue-600
       hover:bg-blue-500 hover:text-white hover:shadow-2xl hover:shadow-blue-500/50" name="ubah" value="UPDATE" onclick="return confirm('Sudah yakin data sudah benar?'); window.history.back();">
    </div>
  </form>
</div>
    </div>

<?php ?>

</body>
</html>