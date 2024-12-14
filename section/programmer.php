<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <?php include "../script/src.php" ?>
</head>

<body>
    <!-- navbar -->
    <?php include "../display/navbar.php" ?>
    <!-- navbar end -->

    <!-- news -->
    <section class="w-full my-8 px-4 h-fit">
        <div class="w-full max-w-[1200px] mx-auto h-fit grid grid-cols-3 gap-8">
            <div class="col-span-2 grid grid-cols-1 gap-6">
                <div class="border border-gray-300 py-5 px-8">
                    <div class="w-full py-3 flex flex-col gap-5" style="scrollbar-width: none;">
                        <div class="flex flex-row items-center gap-1">
                            <i class="ph-fill ph-house-line text-base text-gray-700 font-normal"></i>
                            <a href="#" class="text-sm text-gray-700 font-normal hover:text-[#E20612]">Home</a>
                            <span>/</span>
                            <p class="text-sm text-gray-700 font-normal hover:text-[#E20612]">Programmer
                            </p>
                        </div>
                        <div class="px-3 py-1 text-sm text-white font-normal bg-blue-600 w-fit rounded-sm">Programmer</div>
                        <h1 class="text-gray-800 text-[40px] font-bold leading-[48px]">Profil
                            Perancang</h1>
                        <div class="w-32 aspect-square overflow-hidden rounded-full">
                            <img src="../img/DSC_0383.JPG" class="w-full h-full object-cover">
                        </div>
                        <div class="flex flex-row flex-wrap items-center justify-between">
                            <div class="flex flex-row items-center gap-1">
                                <div class="flex flex-row items-center gap-1 w-max"><i
                                        class="ph-fill ph-user-circle text-gray-600 text-base font-normal"></i>
                                    <span class="w-max text-gray-600 text-xs font-semibold">Vernanda Muhammad
                                        Zaidan</span>
                                </div>
                                <i class="ph-fill ph-dot-outline text-xl text-gray-800"></i>
                                <span class=" text-gray-600 text-xs font-normal">1 day ago</span>
                            </div>
                            <div class="flex flex-row flex-wrap w-fit gap-2">
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph-fill ph-chat-circle-dots text-gray-600 text-sm font-normal"></i>
                                    <span class=" text-gray-600 text-xs font-normal">0</span>
                                </div>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph-fill  ph-fire text-gray-600 text-sm font-normal"></i>
                                    <span class=" text-gray-600 text-xs font-normal">2.030</span>
                                </div>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph-fill ph-bookmark-simple text-gray-600 text-sm font-normal"></i>
                                    <span class=" text-gray-600 text-xs font-normal">3 minutes read</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row items-center justify-start gap-2">
                            <div class="w-9 aspect-square flex bg-[#CD201F] rounded-sm">
                                <i class="ph-fill ph-youtube-logo m-auto text-white text-base"></i>
                            </div>
                            <div class="w-9 aspect-square flex bg-[#c71610] rounded-sm">
                                <i class="ph-fill ph-envelope m-auto text-white text-base"></i>
                            </div>
                            <div class="w-9 aspect-square flex bg-black rounded-sm">
                                <i class="ph ph-x-logo m-auto text-white text-base"></i>
                            </div>
                            <div class="w-9 aspect-square flex bg-[#405DE6] rounded-sm">
                                <i class="ph ph-instagram-logo m-auto text-white text-base"></i>
                            </div>
                            <div class="w-9 aspect-square flex bg-[#E60023] rounded-sm">
                                <i class="ph ph-pinterest-logo m-auto text-white text-base"></i>
                            </div>
                            <div class="w-9 aspect-square flex bg-[#0e76a8] rounded-sm">
                                <i class="ph ph-linkedin-logo m-auto text-white text-base"></i>
                            </div>
                        </div>
                        <div class="content flex flex-col gap-5">
                            <p><strong>Nama lengkap : </strong>Vernanda Muhammad Zaidan Sauri</p>
                            <p><strong>Tanggal Lahir : </strong>8 Agustus 2024</p>
                            <p><strong>Status : </strong>Pelajar</p>
                            <p><strong>Alamat : </strong>Jakarta Selatan</p>
                            <p><strong>Sekolah : </strong>SMA IT HSI IDN</p>
                            <p><strong>Bergabung Sejak : </strong>30 Juni 2022</p>
                            <p><strong>Jumlah Artikel : </strong>78</p>
                            <p><strong>Karya Dan Prestasi : </strong>43</p>
                            <ul>
                                <li>Juara 1 MHQ 30 Juz Internasional Dubai</li>
                                <li>Juara 1 MHQ 30 Juz Internasional Dubai</li>
                                <li>Juara 1 MHQ 30 Juz Internasional Dubai</li>
                                <li>Juara 1 MHQ 30 Juz Internasional Dubai</li>
                                <li>Juara 1 MHQ 30 Juz Internasional Dubai</li>
                                <li>Juara 1 MHQ 30 Juz Internasional Dubai</li>
                                <li><a href="">Selengkapnya</a></li>
                            </ul>
                            <h2 class="text-3xl font-semibold text-gray-800 mt-12">Tentang penulis</h2>
                            <p class="text-base text-gray-700 font-normal">Ini adalah perjalan tentang firman Allah :
                            </p>
                            <div class="w-full h-fit px-12 py-8 bg-gray-800">
                                <p class="text-2xl text-white font-normal mb-5">يَٰٓأَيُّهَا ٱلَّذِينَ ءَامَنُوٓا۟ إِذَا
                                    نُودِىَ لِلصَّلَوٰةِ مِن يَوْمِ ٱلْجُمُعَةِ
                                    فَٱسْعَوْا۟ إِلَىٰ ذِكْرِ ٱللَّهِ
                                    وَذَرُوا۟ ٱلْبَيْعَ ۚ ذَٰلِكُمْ خَيْرٌ لَّكُمْ إِن كُنتُمْ تَعْلَمُونَ
                                </p>
                                <p class="text-lg text-white font-normal">“Hai orang-orang beriman, apabila diseru untuk
                                    menunaikan shalat Jum’at, maka
                                    bersegeralah kamu kepada mengingat Allah
                                    dan tinggalkanlah jual beli. Yang demikian itu lebih baik bagimu jika kamu
                                    mengetahui.” (QS. Al-Jumu’ah: 9)
                                </p>
                            </div>
                            <p class="text-base text-gray-700 font-normal">Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Consequatur ea tempora vitae officiis voluptatum laborum officia
                                voluptatem velit vero quos numquam, cupiditate, perferendis ut, ad eaque distinctio.
                                Commodi, incidunt id! Ducimus magnam in eveniet voluptas, tempora earum error quae nam
                                quos deserunt quasi illo sed, ex distinctio expedita adipisci incidunt.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="border border-gray-300 py-5 px-8">
                    <div class="w-full relative border-b-2 border-gray-300 before:h-[2px] before:bg-blue-600 before:w-24
                                                before:absolute before:-bottom-0.5 before:left-0">
                        <div class="my-4">
                            <span class="text-xl font-semibold text-blue-600">Artikel Dari Penulis</span>
                        </div>
                    </div>
                    <div class="w-full py-6 grid grid-cols-3 gap-5" style="scrollbar-width: none;">
                        <div class="card flex w-full max-w-64 flex-col gap-1">
                            <div class="w-full aspect-video overflow-hidden pb-3">
                                <img src="../img/DSC_0383.JPG" class="w-full h-auto">
                            </div>
                            <div class="flex flex-row items-center justify-between">
                                <div class="flex flex-row items-center gap-1 w-max">
                                    <i class="ph ph-clock-afternoon text-gray-600 text-sm font-normal"></i>
                                    <span class=" text-gray-600 text-xs font-normal">1 day ago</span>
                                </div>
                                <div class="flex flex-row w-fit gap-2">
                                    <div class="flex flex-row items-center gap-1">
                                        <i class="ph-fill ph-chat-circle-dots text-gray-600 text-sm font-normal"></i>
                                        <span class=" text-gray-600 text-xs font-normal">0</span>
                                    </div>
                                    <div class="flex flex-row items-center gap-1">
                                        <i class="ph-fill  ph-fire text-orange-500 text-sm font-normal"></i>
                                        <span class=" text-orange-500 text-xs font-normal">2.030</span>
                                    </div>
                                </div>
                            </div>
                            <span
                                class="text-base text-gray-700 font-semibold leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                Sosial : Kunjungan Ke
                                Panti
                                Asuhan</span>

                        </div>
                        <div class="card flex w-full max-w-64 flex-col gap-1">
                            <div class="w-full aspect-video overflow-hidden pb-3">
                                <img src="../img/DSC_0383.JPG" class="w-full h-auto">
                            </div>
                            <div class="flex flex-row items-center justify-between">
                                <div class="flex flex-row items-center gap-1 w-max">
                                    <i class="ph ph-clock-afternoon text-gray-600 text-sm font-normal"></i>
                                    <span class=" text-gray-600 text-xs font-normal">1 day ago</span>
                                </div>
                                <div class="flex flex-row w-fit gap-2">
                                    <div class="flex flex-row items-center gap-1">
                                        <i class="ph-fill ph-chat-circle-dots text-gray-600 text-sm font-normal"></i>
                                        <span class=" text-gray-600 text-xs font-normal">0</span>
                                    </div>
                                    <div class="flex flex-row items-center gap-1">
                                        <i class="ph-fill  ph-fire text-orange-500 text-sm font-normal"></i>
                                        <span class=" text-orange-500 text-xs font-normal">2.030</span>
                                    </div>
                                </div>
                            </div>
                            <span
                                class="text-base text-gray-700 font-semibold leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                Sosial : Kunjungan Ke
                                Panti
                                Asuhan</span>

                        </div>
                        <div class="card flex w-full max-w-64 flex-col gap-1">
                            <div class="w-full aspect-video overflow-hidden pb-3">
                                <img src="../img/DSC_0383.JPG" class="w-full h-auto">
                            </div>
                            <div class="flex flex-row items-center justify-between">
                                <div class="flex flex-row items-center gap-1 w-max">
                                    <i class="ph ph-clock-afternoon text-gray-600 text-sm font-normal"></i>
                                    <span class=" text-gray-600 text-xs font-normal">1 day ago</span>
                                </div>
                                <div class="flex flex-row w-fit gap-2">
                                    <div class="flex flex-row items-center gap-1">
                                        <i class="ph-fill ph-chat-circle-dots text-gray-600 text-sm font-normal"></i>
                                        <span class=" text-gray-600 text-xs font-normal">0</span>
                                    </div>
                                    <div class="flex flex-row items-center gap-1">
                                        <i class="ph-fill  ph-fire text-orange-500 text-sm font-normal"></i>
                                        <span class=" text-orange-500 text-xs font-normal">2.030</span>
                                    </div>
                                </div>
                            </div>
                            <span
                                class="text-base text-gray-700 font-semibold leading-5 hover:text-[#E20612] transition duration-100">Kegiatan
                                Sosial : Kunjungan Ke
                                Panti
                                Asuhan</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "../display/sidebar.php" ?>
        </div>
    </section>
    <!-- news end -->

    <!-- footer -->

    <?php include "../display/footer.php" ?>

    <!-- footer end -->

    <script src="../script/script.js"></script>
    <script src="../script/jquery-3.7.1.min.js"></script>
    <script src="../slick/slick.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#slider-parent').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 3000,
                prevArrow: '#prev',
                nextArrow: '#next',
            });
        });
        $(document).ready(function() {
            $('#blog-parent').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4,
                dots: true,
                arrows: true,
                autoplay: false,
                //autoplaySpeed: 3000,
                prevArrow: '#blog-prev',
                nextArrow: '#blog-next',
            });
        })
    </script>
</body>

</html>