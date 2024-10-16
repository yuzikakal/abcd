<div class="overflow-x-auto shadow-md sm:rounded-lg mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama Lengkap
                </th>
                <th scope="col" class="px-6 py-3">
                    Asal Sekolah
                </th>
                <th scope="col" class="px-6 py-3">
                    Tempat/Tanggal Lahir
                </th>
                <th scope="col" class="px-6 py-3">
                    Jenis Kelamin
                </th>
                <th scope="col" class="px-6 py-3">
                    Nomor Telepon
                </th>
                <th scope="col" class="px-6 py-3">
                    Agama
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    NISN
                </th>
                <th scope="col" class="px-6 py-3">
                    Jurusan
                </th>
                <th scope="col" class="px-6 py-3 text-transparent">
                    AKSI
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include("config.php");
            $result = mysqli_query($db, "SELECT * FROM pendaftar");
            while ( $data = mysqli_fetch_array($result)) {
            ?>
            <tr class="bg-white border-b hover:bg-gray-50 ">
               <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?=$data["nama"] ?></td>
               <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?=$data["asal"] ?></td>            
               <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?=$data["tempat"] ?>, <span class="font-mono"><?=$data["tanggal"] ?></span></td>            
               <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?=$data["jk"] ?></td>
               <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap font-mono"><?=$data["nomor"] ?></td>            
               <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?=$data["agama"] ?></td>            
               <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?=$data["email"] ?></td>            
               <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap font-mono"><?=$data["nisn"] ?></td>            
               <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?=$data["bid_study"] ?></td>            
               <td class="flex items-center px-6 py-4">
                    <a href="edit.php?ide=<?php echo $data['ID']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    <a href="hapus.php?ide=<?=$data['ID']; ?>" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3"
                    onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>