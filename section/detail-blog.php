<?php
require_once __DIR__ . "/../Model/Model.php";
require_once __DIR__ . "/../Model/Home.php";
$id = $_GET['id'];
if (!isset($id)) {
    header("location: ../index.php");
}
$homes = new Home();
$viewerAdd = $homes->ViewerAdd($id);
$post = $homes->SelectPost($id);
//var_dump($homes->GetTag($id));
// var_dump($viewerAdd);
// var_dump($post);
?>
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
    <?php include "../display/navbar.php"
    ?>
    <!-- navbar end -->

    <!-- news -->
    <section class="w-full my-8 px-4 h-fit">
        <div class="w-full max-w-[1200px] mx-auto h-fit grid grid-cols-3 gap-8">
            <div class="col-span-2 grid grid-cols-1 gap-6">
                <?php foreach ($homes->SelectPost($id) as $post) : ?>
                    <div class="border border-gray-300 py-5 px-8">
                        <div class="w-full py-3 flex flex-col gap-5" style="scrollbar-width: none;">
                            <div class="flex flex-row items-center gap-1">
                                <i class="ph-fill ph-house-line text-base text-gray-700 font-normal"></i>
                                <a href="../index.php" class="text-sm text-gray-700 font-normal hover:text-[#E20612]">Home</a>
                                <span>/</span>
                                <a href="category-home.php?id=<?= $post['post_category_id'] ?>" class="text-sm text-gray-700 font-normal hover:text-[#E20612]"><?= $post['category_name'] ?></a>
                                <span>/</span>
                                <p class="text-sm text-gray-700 font-normal"><?= $post['post_title'] ?>
                                </p>
                            </div>
                            <div class="px-3 py-1 text-sm text-white font-normal bg-blue-600 w-fit rounded-sm"><?= $post['category_name'] ?></div>
                            <h1 class="text-gray-800 text-[40px] font-bold leading-[48px]"><?= $post['post_title'] ?></h1>
                            <div class="flex flex-row flex-wrap items-center justify-between">
                                <div class="flex flex-row items-center gap-1">
                                    <div class="flex flex-row items-center gap-1 w-max"><i
                                            class="ph-fill ph-user-circle text-gray-600 text-base font-normal"></i>
                                        <span class="w-max text-gray-600 text-xs font-semibold"><?= $post['user_name'] ?></span>
                                    </div>
                                    <i class="ph-fill ph-dot-outline text-xl text-gray-800"></i>
                                    <span class=" text-gray-600 text-xs font-normal"><?= $homes->TimeAgo($post['post_created_at']) ?></span>
                                </div>
                                <div class="flex flex-row flex-wrap w-fit gap-2">
                                    <div class="flex flex-row items-center gap-1">
                                        <i class="ph-fill ph-eye text-gray-600 text-sm font-normal"></i>
                                        <span class=" text-gray-600 text-xs font-normal"><?= $post['post_watched'] ?></span>
                                    </div>
                                    <div class="flex flex-row items-center gap-1">
                                        <i class="ph-fill  ph-fire text-[#E20612] text-sm font-normal"></i>
                                        <span class=" text-[#E20612] text-xs font-normal"><?= $post['post_like'] ?></span>
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
                                <!-- <p class="text-base text-gray-700 font-normal">Allah Ta’ala menjelaskan bahwa rezeki yang
                                    Allah jamin untuk hamba-Nya tidak akan salah
                                    alamat, bahkan ketika mereka
                                    meninggalkan aktivitas duniawi untuk memenuhi panggilan-Nya. Perintah untuk meninggalkan
                                    jual beli saat azan Jumat
                                    menjadi pengingat bahwa rezeki tetap datang, terutama bagi mereka yang bertakwa dan
                                    menjadikan Allah sebagai prioritas
                                    dalam kehidupannya.</p> -->
                                <h2 class="text-3xl font-semibold text-gray-800 mt-12"><?= $post['head_1'] ?></h2>
                                <div class="w-full aspect-video overflow-hidden"><img src="../public/img/<?= $post['img_1'] ?>" class="w-full object-cover"></div>
                                <!-- <p class="text-base text-gray-700 font-normal">Allah berfirman dalam surah Al-Jumu’ah:</p> -->
                                <!-- <div class="w-full h-fit px-12 py-8 bg-gray-800">
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
                                </div> -->
                                <p class="text-base text-gray-700 font-normal"><?= $post['content_1'] ?>
                                </p>
                                <h2 class="text-3xl font-semibold text-gray-800 mt-12"><?= $post['head_2'] ?></h2>
                                <p class="text-base text-gray-700 font-normal"><?= $post['content_2'] ?>
                                </p>
                                <!-- <div class="w-full h-fit px-12 py-8 bg-gray-800">
                                    <p class="text-2xl text-white font-normal mb-5"> وَمَنْ يَتَّقِ ٱللَّهَ يَجْعَلْ
                                        لَهُ
                                        مَخْرَجًا , وَيَرْزُقْهُ مِنْ حَيْثُ لَا يَحْتَسِبُ </p>
                                    <p class="text-lg text-white font-normal">“Barang siapa bertakwa kepada Allah, niscaya
                                        Dia akan mengadakan baginya jalan keluar dan memberinya rezeki dari arah
                                        yang tiada disangka-sangkanya.” (QS. Ath-Thalaq: 2-3)
                                    </p>
                                </div> -->
                                <!-- <p class="text-base text-gray-700 font-normal">Menurut Ibnu Taimiyah, ayat ini mengandung
                                    janji bahwa Allah akan membuka jalan keluar dan memberikan rezeki bagi orang
                                    yang bertakwa dari sumber yang tidak mereka duga. Mereka yang bertakwa akan mendapatkan
                                    rezeki yang murni dan halal
                                    tanpa campur tangan dari sumber yang haram atau kotor. Orang bertakwa tidak akan
                                    dibiarkan tanpa rezeki, meski mungkin
                                    mereka tidak diberikan kemewahan dunia yang berlebihan sebagai bentuk rahmat dari Allah.
                                    Sebaliknya, rezeki orang yang
                                    tidak bertakwa bisa diperoleh dengan cara yang sulit atau tidak berkah.
                                </p> -->
                                <h2 class="text-3xl font-semibold text-gray-800 mt-12"><?= $post['head_3'] ?></h2>
                                <p class="text-base text-gray-700 font-normal"><?= $post['content_3'] ?>
                                </p>
                            </div>
                            <div class="flex flex-col gap-5">
                                <span class="text-base text-gray-700 font-normal">Ditulis pada <?= date('d F Y', strtotime($post['post_created_at'])) ?></span>
                                <span class="text-base text-gray-700 font-semibold">Penulis : <a href="author.php?id=<?= $post['post_author'] ?>"
                                        class="text-[#E20612]"><?= $post['user_name'] ?></a></span>
                                <span class="text-base text-gray-700 font-semibold">Artikel : <a href="../index.php"
                                        class="text-[#E20612]">Zaidan's Blog</a></span>
                            </div>
                            <div class="flex flex-row flex-wrap justify-center items-center gap-3">
                                <?php foreach ($homes->GetTag($id) as $tag): ?>
                                    <a href="tag-home.php?id=<?= $tag['tag_id'] ?>" class="px-4 py-1 bg-gray-100 border"><?= $tag['tag_name'] ?></a>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <div class="border border-gray-300 py-5 px-8">
                        <div class="w-full relative border-b-2 border-gray-300 before:h-[2px] before:bg-blue-600 before:w-24
                                    before:absolute before:-bottom-0.5 before:left-0">
                            <div class="my-4">
                                <span class="text-xl font-semibold text-blue-600">Artikel Terkait</span>
                            </div>
                        </div>
                        <div class="w-full py-6 grid grid-cols-3 gap-5" style="scrollbar-width: none;">
                            <?php foreach ($homes->RelatedNews($post['post_category_id']) as $related): ?>
                                <div class="card flex w-full max-w-64 flex-col gap-1">
                                    <div class="w-full aspect-video overflow-hidden pb-3">
                                        <img src="../public/img/<?= $related['img_1'] ?>" class="w-full h-auto">
                                    </div>
                                    <div class="flex flex-row items-center justify-between">
                                        <div class="flex flex-row items-center gap-1 w-max">
                                            <i class="ph ph-clock-afternoon text-gray-600 text-sm font-normal"></i>
                                            <span class=" text-gray-600 text-xs font-normal"><?= $homes->TimeAgo($related['post_created_at']) ?></span>
                                        </div>
                                        <div class="flex flex-row w-fit gap-2">
                                            <div class="flex flex-row items-center gap-1">
                                                <i class="ph-fill ph-chat-circle-dots text-gray-600 text-sm font-normal"></i>
                                                <span class=" text-gray-600 text-xs font-normal"><?= $related['post_watched'] ?></span>
                                            </div>
                                            <div class="flex flex-row items-center gap-1">
                                                <i class="ph-fill  ph-fire text-orange-500 text-sm font-normal"></i>
                                                <span class=" text-orange-500 text-xs font-normal"><?= $related['post_like'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <span
                                        class="text-base text-gray-700 font-semibold leading-5 hover:text-[#E20612] transition duration-100"><?= $related['post_title'] ?>
                                    </span>

                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <?php include "../display/sidebar.php"
            ?>
        </div>
    </section>

    <?php include "../display/footer.php" ?>
    <!-- news end -->


</body>

</html>