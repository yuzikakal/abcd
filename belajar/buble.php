<?php 

$sql = "SELECT * FROM pendaftar WHERE ID = '$id'";
$result = mysqli_query($db, $sql);
$data = mysqli_fetch_array($result);

if ($data["setatus"] == 'diterima') {
    // echo '<div class="text-center">'.$data["pembaharuan"].'</div>';
    echo '<div class="flex p-5 items-start gap-2.5">
                    <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse font-sans">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">'.$data["pembaharuan"].'</span>
                        </div>
                        <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">Selamat!! <br> Anda telah diterima di sekolah kami.</p>
                    </div> 
                </div>';
    

} else if ($data["setatus"] == 'ditolak') {
    echo '<div class="flex p-5 items-start gap-2.5">
                    <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                        <div class="flex items-center space-x-2 rtl:space-x-reverse font-sans">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">'.$data["pembaharuan"].'</span>
                        </div>
                        <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">Mohon maaf '.$data["nama"].', Anda tidak
                        lolos dalam pendaftaran. Terima kasih sudah mendaftar di sekolah kami.</p>
                    </div> 
                </div>';

}

// echo $data["nama"]

?>