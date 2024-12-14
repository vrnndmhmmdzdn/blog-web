<?php
require_once __DIR__ . "/Model/Model.php";
require_once __DIR__ . "/Model/Home.php";
$homes = new Home();
$getCategory1 = $homes->GetCategory(20);
$getCategory2 = $homes->GetCategory(27);
$getCategory3 = $homes->GetCategory(28);
//var_dump($getCategory);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="slick/slick.css">
    <link rel="stylesheet" href="slick/slick-theme.css" type="text/css">
    <link rel="stylesheet" href="css/css.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- navbar -->
    <?php include "display/navbar-index.php" ?>
    <!-- navbar end -->

    <!-- breaking news -->
    <section class="w-full my-8 px-4 h-[399px]">
        <div id="news-parent" class="w-full max-w-[1200px] h-full mx-auto relative">
            <button id="prev"
                class="absolute rounded-r-sm z-10 hidden h-fit w-fit left-0 top-1/3 translate-y-1/2 px-1.5 py-3 bg-white">
                <i class="ph-bold ph-caret-left text-base text-gray-700"></i>
            </button>
            <button id="next"
                class="absolute rounded-l-sm z-10 hidden h-fit w-fit right-0 top-1/3 translate-y-1/2 px-1.5 py-3 bg-white">
                <i class="ph-bold ph-caret-right text-base text-gray-700"></i>
            </button>
            <div id="slider-parent" class="w-full h-full slider max-w-[1200px]">
                <div class="slide-card w-full h-full grid grid-cols-2 gap-2">
                    <?php foreach ($homes->GetIndex('posts', 0, 1) as $home): ?>
                        <a href="section/detail-blog.php?id=<?= $home['post_id'] ?>" class="w-full h-full relative bg-center">
                            <div class="w-full aspect-video overflow-hidden">
                                <img src="public/img/<?= $home['img_1'] ?>" class="w-full h-auto object-cover">
                            </div>
                            <div class="w-full h-full absolute p-5 top-0 left-0 bg-black bg-opacity-30">
                                <div class="relative w-full h-full flex items-end">
                                    <span
                                        class="absolute top-0 left-0 px-2 py-1 bg-blue-600 rounded-md text-white text-sm font-normal">
                                        <?= $home['category_name'] ?>
                                    </span>
                                    <div class="w-full h-fit flex flex-col gap-3">
                                        <span class="text-xs text-white font-normal"><?= $homes->TimeAgo($home['post_created_at']) ?></span>
                                        <h2 class="text-4xl text-white font-semibold"><?= $home['post_title'] ?></h2>
                                        <p class="text-sm text-white font-normal line-clamp-2"><?= $home['content_1'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>
                    <div class="w-full h-full grid grid-cols-2 grid-rows-2 gap-2">
                        <?php foreach ($homes->GetIndex('posts', 1, 4) as $home): ?>
                            <a href="section/detail-blog.php?id=<?= $home['post_id'] ?>" class="w-full h-full relative">
                                <div class="w-full aspect-video overflow-hidden">
                                    <img src="public/img/<?= $home['img_1'] ?>" class="w-full h-auto object-cover bg-center">
                                </div>
                                <div class="w-full h-full absolute px-5 py-3 top-0 left-0 bg-black bg-opacity-30">
                                    <div class="news-child relative w-full h-full flex items-end">
                                        <span
                                            class="absolute z-10 top-0 left-0 px-2 py-1 bg-blue-600 rounded-md text-white text-xs font-normal"><?= $home['category_name'] ?></span>
                                        <div
                                            class="w-full h-fit transition duration-300 flex flex-col gap-1 justify-start z-20">
                                            <span class="text-xs text-white font-normal"><?= $homes->TimeAgo($home['post_created_at']) ?></span>
                                            <h2 class="text-2xl text-white font-semibold leading-7 clear-start line-clamp-3"><?= $home['post_title'] ?></h2>
                                            <p
                                                class="news-child-capt transition duration-300 hidden text-sm text-white font-normal leading-4 line-clamp-5">
                                                <?= $home['content_1'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="slide-card w-full h-full grid grid-cols-2 gap-2">
                    <?php foreach ($homes->GetIndex('posts', 5, 1) as $home): ?>
                        <a href="section/detail-blog.php?id=<?= $home['post_id'] ?>" class="w-full h-full relative">
                            <div class="w-full aspect-video overflow-hidden">
                                <img src="public/img/<?= $home['img_1'] ?>" class="w-full h-auto object-cover bg-center">
                            </div>
                            <div class="w-full h-full absolute p-5 top-0 left-0 bg-black bg-opacity-30">
                                <div class="relative w-full h-full flex items-end">
                                    <span
                                        class="absolute top-0 left-0 px-2 py-1 bg-blue-600 rounded-md text-white text-sm font-normal">
                                        <?= $home['category_name'] ?>
                                    </span>
                                    <div class="w-full h-fit flex flex-col gap-3">
                                        <span class="text-xs text-white font-normal"><?= $homes->TimeAgo($home['post_created_at']) ?></span>
                                        <h2 class="text-4xl text-white font-semibold"><?= $home['post_title'] ?></h2>
                                        <p class="text-sm text-white font-normal line-clamp-2"><?= $home['content_1'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>
                    <div class="w-full h-full grid grid-cols-2 grid-rows-2 gap-2">
                        <?php foreach ($homes->GetIndex('posts', 6, 4) as $home): ?>
                            <a href="section/detail-blog.php?id=<?= $home['post_id'] ?>" class="w-full h-full relative">
                                <div class="w-full aspect-video overflow-hidden">
                                    <img src="public/img/<?= $home['img_1'] ?>" class="w-full h-auto object-cover bg-center">
                                </div>
                                <div class="w-full h-full absolute px-5 py-3 top-0 left-0 bg-black bg-opacity-30">
                                    <div class="news-child relative w-full h-full flex items-end">
                                        <span
                                            class="absolute z-10 top-0 left-0 px-2 py-1 bg-blue-600 rounded-md text-white text-xs font-normal"><?= $home['category_name'] ?></span>
                                        <div
                                            class="w-full h-fit transition duration-300 flex flex-col gap-1 justify-start z-20">
                                            <span class="text-xs text-white font-normal"><?= $homes->TimeAgo($home['post_created_at']) ?></span>
                                            <h2 class="text-2xl text-white font-semibold leading-7 line-clamp-3"><?= $home['post_title'] ?></h2>
                                            <p
                                                class="news-child-capt transition duration-300 hidden text-sm text-white font-normal leading-4 line-clamp-5">
                                                <?= $home['content_1'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breaking news end -->

    <!-- blog -->
    <section class="w-full my-8 px-4 h-[420px]">
        <div class="w-full max-w-[1200px] h-full mx-auto py-5 px-8 border border-gray-300">
            <div
                class="w-full relative flex flex-row items-center justify-between border-b-2 border-gray-300 before:h-[2px] before:bg-[#E20612]  before:w-24 before:absolute before:-bottom-0.5 before:left-0">
                <div class="my-4">
                    <span class="text-xl font-semibold text-[#E20612]">
                        <?= $getCategory1['category_name']; ?>
                    </span>
                </div>
                <div class="space-x-1">
                    <button id="blog-prev" class="w-6 aspect-square border"><i
                            class="ph ph-caret-left text-sm font-medium"></i></button>
                    <button id="blog-next" class="w-6 aspect-square border"><i
                            class="ph ph-caret-right text-sm font-medium"></i></button>
                </div>
            </div>
            <div id="blog-parent" class="w-full py-6" style="scrollbar-width: none;">
                <?php foreach ($homes->PostIndex($getCategory1['category_id'], 8) as $categoryPost):
                ?>
                    <a href="section/detail-blog.php?id=<?= $categoryPost['post_id'] ?>" class="card flex w-full max-w-64 flex-col gap-2">
                        <div class="w-full aspect-video overflow-hidden pb-3">
                            <img src="public/img/<?= $categoryPost['img_1'] ?>" class="w-full h-auto object-cover">
                        </div>
                        <div class="flex flex-row items-center justify-between">
                            <div class="flex flex-row items-center gap-1 w-max">
                                <i class="ph ph-clock-afternoon text-gray-600 text-sm font-normal"></i>
                                <span class=" text-gray-600 text-[10px] font-normal"><?= date('F d Y', strtotime($categoryPost['post_created_at'])) ?></span>
                            </div>
                            <div class="flex flex-row w-fit gap-2">
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph-fill ph-eye text-gray-600 text-sm font-normal"></i>
                                    <span class=" text-gray-600 text-xs font-normal"><?= $categoryPost['post_watched'] ?></span>
                                </div>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph-fill  ph-fire text-orange-500 text-sm font-normal"></i>
                                    <span class=" text-orange-500 text-xs font-normal"><?= $categoryPost['post_like'] ?></span>
                                </div>
                            </div>
                        </div>
                        <span
                            class="text-lg text-gray-700 font-semibold leading-6 hover:text-[#E20612] transition duration-100 line-clamp-2">Kegiatan
                            <?= $categoryPost['post_title'] ?></span>

                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <!-- blog end -->

    <!-- news -->
    <section class="w-full my-8 px-4 h-fit">
        <div class="w-full max-w-[1200px] mx-auto h-fit grid grid-cols-3 gap-8">
            <div class="col-span-2 grid grid-cols-1 gap-6">
                <div class="border border-gray-300 py-5 px-8">
                    <div class="w-full relative border-b-2 border-gray-300 before:h-[2px] before:bg-blue-600 before:w-24
                    before:absolute before:-bottom-0.5 before:left-0">
                        <div class="my-4">
                            <span class="text-xl font-semibold text-blue-600"><?= $getCategory2['category_name'] ?></span>
                        </div>
                    </div>
                    <div class="w-full py-6 grid grid-cols-3 gap-5" style="scrollbar-width: none;">

                        <?php foreach ($homes->PostIndex($getCategory2['category_id'], 3) as $categoryPost): ?>
                            <a href="section/detail-blog.php?id=<?= $categoryPost['post_id'] ?>" class="card flex w-full max-w-64 flex-col gap-1">
                                <div class="w-full aspect-video overflow-hidden pb-3">
                                    <img src="public/img/<?= $categoryPost['img_1'] ?>" class="w-full h-auto">
                                </div>
                                <div class="flex flex-row items-center justify-between">
                                    <div class="flex flex-row items-center gap-1 w-max">
                                        <i class="ph ph-clock-afternoon text-gray-600 text-sm font-normal"></i>
                                        <span class=" text-gray-600 text-[10px] font-normal"><?= date('F d Y', strtotime($categoryPost['post_created_at'])) ?></span>
                                    </div>
                                    <div class="flex flex-row w-fit gap-2">
                                        <div class="flex flex-row items-center gap-1">
                                            <i class="ph-fill ph-eye text-gray-600 text-sm font-normal"></i>
                                            <span class=" text-gray-600 text-xs font-normal"><?= $categoryPost['post_watched'] ?></span>
                                        </div>
                                        <div class="flex flex-row items-center gap-1">
                                            <i class="ph-fill  ph-fire text-orange-500 text-sm font-normal"></i>
                                            <span class=" text-orange-500 text-xs font-normal"><?= $categoryPost['post_like'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <span
                                    class="text-base text-gray-700 font-semibold leading-5 hover:text-[#E20612] transition duration-100"><?= $categoryPost['post_title'] ?></span>
                            </a>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="border border-gray-300 py-5 px-8">
                    <div class="w-full relative border-b-2 border-gray-300 before:h-[2px] before:bg-blue-600 before:w-24
                    before:absolute before:-bottom-0.5 before:left-0">
                        <div class="my-4">
                            <span class="text-xl font-semibold text-blue-600"><?= $getCategory3['category_name'] ?></span>
                        </div>
                    </div>
                    <div class="w-full py-6 grid grid-cols-2 grid-rows-2 gap-7" style="scrollbar-width: none;">
                        <?php foreach ($homes->PostIndex($getCategory3['category_id'], 4) as $categoryPost): ?>
                            <div class="card space-y-3">
                                <div class=" w-full aspect-video overflow-hidden"><img src="public/img/<?= $categoryPost['img_1'] ?>"
                                        class="w-full h-auto"></div>
                                <div class="flex flex-col gap-3">
                                    <div class="flex flex-row flex-wrap items-center justify-between">
                                        <div class="flex flex-row items-center gap-1 w-max">
                                            <i class="ph-fill ph-user-circle text-gray-600 text-sm font-normal"></i>
                                            <a href="section/author.php?id=<?= $categoryPost['post_author'] ?>" class="w-max hover:text-[#E20612] text-gray-600 text-xs"><?= $categoryPost['user_name'] ?></a>
                                        </div>
                                        <div class="flex flex-row flex-wrap w-fit gap-2">
                                            <i class="ph ph-clock-afternoon text-gray-600 text-sm font-normal"></i>
                                            <span class=" text-gray-600 text-[10px] font-normal"><?= date('F d Y', strtotime($categoryPost['post_created_at'])) ?></span>
                                            <div class="flex flex-row items-center gap-1">
                                                <i
                                                    class="ph-fill ph-eye text-gray-600 text-sm font-normal"></i>
                                                <span class=" text-gray-600 text-xs font-normal"><?= $categoryPost['post_watched'] ?></span>
                                            </div>
                                            <div class="flex flex-row items-center gap-1">
                                                <i class="ph-fill  ph-fire text-orange-500 text-sm font-normal"></i>
                                                <span class=" text-orange-500 text-xs font-normal"><?= $categoryPost['post_like'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="section/detail-blog.php?id=<?= $categoryPost['post_id'] ?>"
                                        class="text-2xl text-gray-900 font-semibold leading-7 hover:text-[#E20612] transition duration-100"><?= $categoryPost['post_title'] ?></a>
                                    <p class="line-clamp-3 text-justify text-gray-700 text-sm leading-5"><?= $categoryPost['content_1'] ?></p>
                                    <a href="section/detail-blog.php?id=<?= $categoryPost['post_id'] ?>"
                                        class="w-fit px-5 py-3 bg-sky-400 hover:bg-sky-300 transition duration-150 rounded-sm text-white font-semibold text-sm">Baca
                                        Selengkapnya ></a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

            </div>
            <?php include "display/sidebar-index.php" ?>
        </div>
    </section>
    <!-- news end -->

    <!-- footer -->

    <?php include "display/footer.php" ?>

    <!-- footer end -->



    <script src="script/script.js"></script>
    <script src="script/jquery-3.7.1.min.js"></script>
    <script src="slick/slick.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#slider-parent').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 5000,
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