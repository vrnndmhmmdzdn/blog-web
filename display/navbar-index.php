<?php
setlocale(LC_TIME, 'id_ID.UTF-8');
date_default_timezone_set('Asia/Jakarta');

$tanggal = strftime('%A, %e %B %Y');
$result = $homes->HeaderShow();
$titles = [];
while ($row = mysqli_fetch_assoc($result)) {
    $titles[] = $row['post_title'];
}
?>
<div class="w-full px-4 h-10 border-b">
    <div class="w-full max-w-[1200px] mx-auto h-full flex flex-row items-center justify-between">
        <div class="flex flex-row items-center gap-3 md:gap-4 h-full">
            <div class="text-sm font-light hidden lg:block">
                <span><?= $tanggal ?></span>
            </div>
            <div class="bg-[#E20612] text-white h-full p-1.5 md:p-3 text-sm font-normal flex items-center">
                <span class="hidden md:block w-max">Artikel Baru</span>
                <i class="ph-fill ph-lightning text-sm text-white md:hidden"></i>
            </div>
            <div class="text-sm font-light">
                <p id="scrolling-text"></p>
            </div>
        </div>
        <div class="flex flex-row items-center gap-4">

            <div class="hidden lg:block">
                <button class="w-6"><i class="ph ph-moon text-lg font-medium"></i></button>
                <button class="hidden w-6"><i class="ph ph-sun text-lg font-medium"></i></button>
            </div>
            <div class="w-fit relative hidden lg:block">
                <input type="text" placeholder="Cari Artikel"
                    class="h-full focus:outline-none focus:ring-0 py-1.5 px-5 w-56 rounded-full bg-gray-100 text-sm font-normal">
                <div class="absolute right-3 top-0 bottom-0 h-full flex items-center">
                    <i class="ph-bold ph-magnifying-glass text-base text-gray-500"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="w-full px-4 shadow-lg">
    <div class=" h-52 w-full max-w-[1200px] mx-auto grid grid-cols-1 grid-rows-2 lg:grid-cols-3 gap-4">
        <div class="lg:row-span-2 flex items-center">
            <img src="img/rumaysho.png" class="object-cover w-full h-fit">
        </div>
        <div class="col-span-2 lg:mt-4">
            <img src="img/rumaysho-ads.jpg" class="w-full h-fit">
        </div>
    </div>
    <div class="h-16 w-full max-w-[1200px] bg-[#1F2024] mx-auto relative">
        <div class="h-full w-full flex flex-row items-center justify-center">
            <a href="index.php" class="h-full w-fit bg-[#E20612] aspect-square flex">
                <i class="ph-fill ph-house-line m-auto text-white underline text-2xl"></i>
            </a>
            <div class="w-full h-full flex flex-row">
                <div id="belajar-islam-parent"
                    class="w-max h-full flex flex-row items-center px-4 gap-0.5 hover:bg-[#E20612] transition duration-200">
                    <span class="text-white font-bold text-sm uppercase">Menu</span><i class="ph-bold ph-caret-down text-white font-extrabold text-sm mt-1"></i>
                </div>
                <div id="naskah-khutbah-parent"
                    class="w-max h-full flex flex-row items-center px-4 gap-0.5 hover:bg-[#E20612] transition duration-200">
                    <span class="text-white font-bold text-sm uppercase">Content</span><i class="ph-bold ph-caret-down text-white font-extrabold text-sm mt-1"></i>
                </div>
                <a href="dashboard/post-create.php"
                    class="w-max h-full flex flex-row items-center px-4 gap-0.5 hover:bg-[#E20612] transition duration-200">
                    <span class="text-white font-bold text-sm uppercase">Make an article</span>
                </a>
                <a href="dashboard.php"
                    class="w-max h-full flex flex-row items-center px-4 gap-0.5 hover:bg-[#E20612] transition duration-200">
                    <span class="text-white font-bold text-sm uppercase">Dashboard</span>
                </a>
            </div>
            <div class="h-full w-fit aspect-square flex">
                <i class="ph-bold ph-moon text-white text-xl font-medium m-auto"></i>
            </div>
        </div>
        <div id="belajar-islam"
            class="hidden z-10 absolute p-5 bg-[#1F2024] left-16 w-56 border-t-2 border-t-[#E20612]">
            <ul class="text-white font-normal text-sm w-full space-y-2">
                <li class="flex flex-row justify-between items-center group"><span
                        class="text-sm group-hover:text-[#E20612] transition duration-100">Hukum
                        Islam</span><i
                        class="ph ph-caret-right text-base group-hover:text-[#E20612] transition duration-100"></i>
                </li>
                <li class="flex flex-row justify-between items-center group"><span
                        class="text-sm group-hover:text-[#E20612] transition duration-100">Belajar
                        Islam</span><i
                        class="ph ph-caret-right text-base group-hover:text-[#E20612] transition duration-100"></i>
                </li>
            </ul>
        </div>
        <div id="naskah-khutbah"
            class="pl-6 hidden z-10 bg-[#393a3b] absolute w-full h-64 border-t-2 border-t-[#E20612]">
            <div class="flex flex-row items-center h-full w-full">
                <ul id="all-btn" class="text-white w-56">
                    <li id="semua-btn"
                        class="cursor-pointer py-2 px-3 bg-[#1F2024] text-[#E20612] text-sm font-normal rounded-l hover:bg-[#1F2024] hover:text-[#E20612] transition duration-100">
                        Semua</li>
                    <li id="hari-raya-btn"
                        class="cursor-pointer py-2 px-3 text-sm font-normal rounded-l hover:bg-[#1F2024] hover:text-[#E20612] transition duration-100">
                        Khutbah Hari Raya</li>
                    <li id="jumat-btn"
                        class="cursor-pointer py-2 px-3 text-sm font-normal rounded-l hover:bg-[#1F2024] hover:text-[#E20612] transition duration-100">
                        Khutbah Jum'at</li>
                    <li id="umum-btn"
                        class="cursor-pointer py-2 px-3 text-sm font-normal rounded-l hover:bg-[#1F2024] hover:text-[#E20612] transition duration-100">
                        Khutbah Umum</li>
                </ul>
                <div id="all-content" class="w-full h-full bg-[#1F2024] flex p-5">
                    <div id="semua-content" class="">
                        <div class="grid grid-cols-4 gap-5 m-auto">
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Menutup pintu kesyirikan</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Menutup pintu kesyirikan</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Menutup pintu kesyirikan</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Menutup pintu kesyirikan</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="hari-raya-content" class="hidden">
                        <div class="grid grid-cols-4 gap-5 m-auto">
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Bersabar atas musibah yang menimpa</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Bersabar atas musibah yang menimpa</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Bersabar atas musibah yang menimpa</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Bersabar atas musibah yang menimpa</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="jumat-content" class="hidden">
                        <div class="grid grid-cols-4 gap-5 m-auto">
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Macam macam ilhad dan pelaku nya</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Macam macam ilhad dan pelaku nya</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Macam macam ilhad dan pelaku nya</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Macam macam ilhad dan pelaku nya</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="umum-content" class="hidden">
                        <div class="grid grid-cols-4 gap-5 m-auto">
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Beriman kepada akhirat dan hari akhir</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Beriman kepada akhirat dan hari akhir</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Beriman kepada akhirat dan hari akhir</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                            <div class="card flex flex-col gap-1.5">
                                <div class="w-full aspect-video overflow-hidden"><img src="img/DSC_0383.JPG"
                                        class="w-full">
                                </div>
                                <span
                                    class="text-base text-white font-normal leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                    Beriman kepada akhirat dan hari akhir</span>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph ph-clock-afternoon text-gray-400 text-sm font-normal"></i>
                                    <span class=" text-gray-400 text-xs font-normal">Ahad, 3 November2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
    var titles = <?php echo json_encode($titles); ?>;
    let i = 0; // Index judul artikel
    let textElement = document.getElementById("scrolling-text");

    function typingEffect() {
        let title = titles[i];
        let currentText = "";
        let j = 0;

        // Menghapus teks sebelumnya
        textElement.innerHTML = "";

        function type() {
            if (j < title.length) {
                currentText += title[j++];
                textElement.innerHTML = currentText;
                setTimeout(type, 30); // Kecepatan mengetik
            } else {
                setTimeout(function() {
                    i = (i + 1) % titles.length; // Ganti ke judul berikutnya setelah selesai mengetik
                    typingEffect();
                }, 2000); // Waktu jeda sebelum mulai mengetik judul berikutnya
            }
        }

        type();
    }

    typingEffect()
</script>