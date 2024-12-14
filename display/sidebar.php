<?php

?>
<div class="col-span-1 flex flex-col gap-6">
    <!-- 1 -->
    <div class="border border-gray-300 py-6 px-8 grid grid-cols-2 grid-rows-2 gap-3">
        <div class="bg-[#CD201F] flex py-2 px-4 rounded-sm w-full h-fit">
            <div class="m-auto w-full h-fit flex items-center justify-start gap-2">
                <i class="ph-fill ph-youtube-logo text-2xl text-white"></i>
                <span class="text-white font-normal text-base">Youtube</span>
            </div>
        </div>
        <div class="bg-[#25D366] flex py-2 px-4 rounded-sm w-full h-fit">
            <div class="m-auto w-full h-fit flex items-center justify-start gap-2">
                <i class="ph-fill ph-whatsapp-logo text-2xl text-white"></i>
                <span class="text-white font-normal text-base">Whatsapp</span>
            </div>
        </div>
        <div class="bg-[#405DE6] flex py-2 px-4 rounded-sm w-full h-fit">
            <div class="m-auto w-full h-fit flex items-center justify-start gap-2">
                <i class="ph-fill ph-instagram-logo text-2xl text-white"></i>
                <span class="text-white font-normal text-base">Instagram</span>
            </div>
        </div>
        <div class="bg-[#0e76a8] flex py-2 px-4 rounded-sm w-full h-fit">
            <div class="m-auto w-full h-fit flex items-center justify-start gap-2">
                <i class="ph-fill ph-linkedin-logo text-2xl text-white"></i>
                <span class="text-white font-normal text-base">Linkedin</span>
            </div>
        </div>
    </div>
    <!-- 2 -->
    <div class="border border-gray-300 py-6 px-8">
        <div
            class="w-full pb-3 relative flex flex-row items-center justify-between border-b-2 border-gray-300 before:h-[2px] before:bg-gray-800  before:w-24 before:absolute before:-bottom-0.5 before:left-0">
            <div class="">
                <span class="text-xl font-semibold text-gray-800">Follow Us</span>
            </div>
        </div>
    </div>
    <!-- 3 -->
    <div class="w-full h-auto"><img src="../img/iklan-buku-rumaysho.png" class="w-full"></div>
    <!-- 4 -->
    <div class="w-full h-auto"><img src="../img/iklan-studio-rumaysho.jpg" class="w-full"></div>
    <!-- 5 -->
    <div class="border border-gray-300 pb-5 h-max">
        <div class="grid grid-cols-2 divide-x divide-gray-300 border-b border-gray-300">
            <div id="populer-button" class="text-center h-16 flex text-[#E20612] cursor-pointer"><span
                    class="m-auto">Populer</span></div>
            <div id="terbaru-button" class="text-center h-16 flex cursor-pointer"><span
                    class="m-auto">Terbaru</span></div>
        </div>
        <div class="relative">
            <div id="populer" class="absolute top-0 right-0 left-0 scale-100 transition">
                <?php foreach ($homes->HotNews() as $hotNews): ?>
                    <a href="detail-blog.php?id=<?= $hotNews['post_id'] ?>" class="my-5 px-7 flex flex-row gap-3">
                        <div class="max-w-32 aspect-video overflow-hidden"><img src="../public/img/<?= $hotNews['img_1'] ?>" class="w-full object-cover bg-center"></div>
                        <div class="py-1 group">
                            <h5 class="text-gray-800 font-semibold text-base line-clamp-2 group-hover:text-[#E20612]"><?= $hotNews['post_title'] ?></h5>
                            <div class="flex flex-row items-center gap-1 w-max">
                                <i class="ph ph-clock-afternoon text-gray-600 text-sm font-normal"></i>
                                <span class=" text-gray-600 text-xs font-normal"><?= $homes->TimeAgo($hotNews['post_created_at']) ?></span>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
            <div id="terbaru" class="absolute top-0 right-0 left-0 scale-0 transition">
                <?php foreach ($homes->RecentNews() as $recentNews): ?>
                    <a href="detail-blog.php?id=<?= $recentNews['post_id'] ?>" class="my-5 px-7 flex flex-row gap-3">
                        <div class="max-w-32 aspect-video overflow-hidden"><img src="../public/img/<?= $recentNews['img_1'] ?>" class="w-full object-cover bg-center"></div>
                        <div class="py-1 group">
                            <h5 class="text-gray-800 font-semibold text-base line-clamp-2 group-hover:text-[#E20612] transition duration-150"><?= $recentNews['post_title'] ?>
                            </h5>
                            <div class="flex flex-row items-center gap-1 w-max">
                                <i class="ph ph-clock-afternoon text-gray-600 text-sm font-normal"></i>
                                <span class=" text-gray-600 text-xs font-normal"><?= $homes->TimeAgo($recentNews['post_created_at']) ?></span>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
            <div class="visible scale-0 transition">
                <?php foreach ($homes->RecentNews() as $recentNews): ?>
                    <a href="detail-blog.php?id=<?= $recentNews['post_id'] ?>" class="my-5 px-7 flex flex-row gap-3">
                        <div class="max-w-32 aspect-video overflow-hidden"><img src="../public/img/<?= $recentNews['img_1'] ?>" class="w-full object-cover bg-center"></div>
                        <div class="py-1 group">
                            <h5 class="text-gray-800 font-semibold text-base line-clamp-2 group-hover:text-[#E20612] transition duration-150"><?= $recentNews['post_title'] ?>
                            </h5>
                            <div class="flex flex-row items-center gap-1 w-max">
                                <i class="ph ph-clock-afternoon text-gray-600 text-sm font-normal"></i>
                                <span class=" text-gray-600 text-xs font-normal"><?= $homes->TimeAgo($recentNews['post_created_at']) ?></span>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<script>
    const populer = document.getElementById('populer');
    const terbaru = document.getElementById('terbaru');
    const populerBtn = document.getElementById('populer-button');
    const terbaruBtn = document.getElementById('terbaru-button');
    // text-[#E20612]
    populerBtn.addEventListener('click', function() {
        populerBtn.classList.add('text-[#E20612]');
        populer.classList.add('scale-100');
        populer.classList.remove('scale-0');
        terbaruBtn.classList.remove('text-[#E20612]');
        terbaru.classList.add('scale-0');
        terbaru.classList.remove('scale-100');
    });
    terbaruBtn.addEventListener('click', function() {
        terbaruBtn.classList.add('text-[#E20612]');
        terbaru.classList.remove('scale-0');
        terbaru.classList.add('scale-100');
        populerBtn.classList.remove('text-[#E20612]');
        populer.classList.add('scale-0');
        populer.classList.remove('scale-100');
    });
</script>