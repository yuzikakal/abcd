<?php
include("status.php");
?>

<div class="overflow-x-auto shadow-md sm:rounded-lg mt-5">
    
        <table class="text-md bg-white rounded mb-4 md:w-full">
            <tbody>
                <tr class="border-b bg-gray-100 w-full">
                    <th class="text-left p-3 px-5">Nama Pendaftar</th>
                    <th class="text-left p-3 px-5">Status Pendaftaran</th>
                    <th class="text-left p-3 px-5 text-transparent">Role</th>
                    <th></th>
                </tr>
                <?php 
            include("config.php");
            $result = mysqli_query($db, "SELECT * FROM pendaftar");

            
            while ($data = mysqli_fetch_array($result)) {
            ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3 px-5">
                        <p class="bg-transparent"><?=$data['nama']?></p>
                    </td>
                    <td class="p-3 px-5">
                    <form action="" method="POST">
                        <select name="setatus" class="bg-transparent">
                            <?php
                            if ($data['setatus'] == "dicadangkan") echo "<option selected>dicadangkan</option>";
                            else echo "<option>dicadangkan</option>"; ?>
                            <?php
                            if ($data['setatus'] == "diterima") echo "<option selected>diterima</option>";
                            else echo "<option>diterima</option>"; ?>
                            <?php
                            if ($data['setatus'] == "ditolak") echo "<option selected>ditolak</option>";
                            else echo "<option>ditolak</option>"; ?>
                        </select>
                        <input type="hidden" name="ID" value="<?php echo $data['ID'] ?>">
                    </td>
                    <td class="p-3 px-5 flex justify-end">
                   
                            <button type="submit" name="update" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Update</b>
                            </form>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>