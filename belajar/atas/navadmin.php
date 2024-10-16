
<div class="flex items-center justify-between sticky bg-fixed top-3 ">
                    <div class="flex items-center">
                        <a class="bg-white rounded-full ring-1 ring-indigo-200 focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800" href="dasbor3.php">
                            <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                <p>Data Siswa</p>
                            </div>
                        </a>
                        <a class="bg-white rounded-full ring-1 ring-indigo-200 focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="dasbor4.php">
                            <div class="py-2 px-8 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                <p>Status Siswa</p>
                            </div>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center justify-between sticky bg-fixed top-3 gap-3 flex-col md:flex-row">
                    <form action="tambah.php">
                    <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600  inline-flex items-center justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 hover:shadow-xl hover:shadow-blue-600/50 focus:outline-none rounded">
                        <p class="text-sm font-medium leading-none text-white">Tambah Data</p>
                    </button></form>
                    <form method="POST" action="logout.php">
                    <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600  inline-flex items-center justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 hover:shadow-xl hover:shadow-blue-600/50 focus:outline-none rounded">
                        <p class="text-sm font-medium leading-none text-white">Logout</p>
                    </button></form>
                    </div>
                    <div class="tombol block h-full pt-2 pb-4 px-3 text-3xl bg-none md:hidden">
                    <i class="ph ph-list h-full"></i>
                    </div>
</div>
<span class="isi hidden top-14 md:hidden fixed text-white left-0 mt-4 w-full bg-indigo-900">
    <div class="flex flex-col text-2xl px-2">
    <a href="tambah.php" class="p-4 text-right">Tambah Data</a>    
    <a href="logout.php" class="px-4 pb-4 text-right">Logout</a>    
    </div>
</span>

<script>
    const tombol = document.querySelector('.tombol');
    const isi =document.querySelector('.isi');

    tombol.addEventListener('click', function() {
        isi.classList.toggle('hidden');
    })

    tombol.addEventListener('click', function() {
        tombol.classList.toggle('bg-indigo-900');
    })
    tombol.addEventListener('click', function() {
        tombol.classList.toggle('text-white');
    })
</script>