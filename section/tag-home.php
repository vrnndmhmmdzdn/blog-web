<?php
require_once __DIR__ . "/../Model/Model.php";
require_once __DIR__ . "/../Model/Home.php";
$id = $_GET['id'];
if (!isset($id)) {
    header("location: ../index.php");
}
$homes = new Home();
if ($check = $homes->Check('tags', 'tag_id', $id)) {
    header("location: ../index.php");
}
$tagTitle = $homes->Tag($id);
$tagContent = $homes->TagHome($id);
//var_dump($tagContent);
$totalAuthors = $homes->GetAuthorCountForTag($id);
$likeTotal = $homes->LikeWatchTotal('posts.post_like', $id);
$watchTotal = $homes->LikeWatchTotal('posts.post_watched', $id);

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
                <div class="border border-gray-300 py-5 px-8">
                    <div class="w-full py-3 flex flex-col gap-5 border-b-2 mb-10" style="scrollbar-width: none;">
                        <div class="flex flex-row items-center gap-1">
                            <i class="ph-fill ph-house-line text-base text-gray-700 font-normal"></i>
                            <a href="../index.php" class="text-sm text-gray-700 font-normal hover:text-[#E20612]">Home</a>
                            <span>/</span>
                            <p class="text-sm text-gray-700 font-normal hover:text-[#E20612]"><?= $tagTitle[0]['tag_name'] ?></p>

                        </div>
                        <div class="px-3 py-1 text-sm text-white font-normal bg-blue-600 w-fit rounded-sm">Tag Title</div>
                        <h1 class="text-gray-800 text-[40px] font-bold leading-[48px]"><?= $tagTitle[0]['tag_name'] ?> </h1>
                        <div class="flex flex-row flex-wrap items-center justify-between">
                            <div class="flex flex-row items-center gap-3">
                                <div class="flex flex-row items-center gap-1 w-max"><i
                                        class="ph ph-article text-gray-600 text-lg font-normal"></i>
                                    <span class="w-max text-gray-600 text-xs font-semibold"><?= count($tagContent) . ' articles' ?></span>
                                </div>
                                <i class="ph-fill ph-users text-xl text-gray-800"></i>
                                <span class=" text-gray-600 text-xs font-normal"><?= '999 authors' ?></span>
                            </div>
                            <div class="flex flex-row flex-wrap w-fit gap-2">
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph-fill ph-eye text-gray-600 text-sm font-normal"></i>
                                    <span class=" text-gray-600 text-xs font-normal"><?= $watchTotal[0]['total'] ?></span>
                                </div>
                                <div class="flex flex-row items-center gap-1">
                                    <i class="ph-fill  ph-fire text-[#E20612] text-sm font-normal"></i>
                                    <span class=" text-[#E20612] text-xs font-normal"><?= $likeTotal[0]['total'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center items-center gap-7">
                        <?php foreach ($tagContent as $content): ?>
                            <div class="card grid grid-cols-2 gap-4">
                                <div class=" w-full aspect-video overflow-hidden">
                                    <img src="../public/img/<?= $content['img_1'] ?>"
                                        class="w-full h-auto">
                                </div>
                                <div class="flex flex-col gap-3">
                                    <div class="flex flex-row flex-wrap items-center justify-between">
                                        <div class="flex flex-row flex-wrap w-fit gap-2">
                                            <div class="flex flex-row items-center gap-1 w-max">
                                                <i class="ph-fill ph-user-circle text-gray-600 text-sm font-normal"></i>
                                                <a href="author.php?id=<?= $content['user_id'] ?>" class="w-max hover:text-[#E20612] text-gray-600 text-xs"><?= $content['user_name'] ?></a>
                                            </div>
                                            <div class="flex flex-row items-center gap-1">
                                                <i class=" ph ph-clock-afternoon text-gray-600 text-sm font-normal"></i>
                                                <span class=" text-gray-600 text-[10px] font-normal"><?= date('F d Y', strtotime($content['post_created_at'])) ?></span>
                                            </div>
                                        </div>
                                        <div class="flex flex-row flex-wrap w-fit gap-2">
                                            <div class="flex flex-row items-center gap-1">
                                                <i
                                                    class="ph-fill ph-eye text-gray-600 text-sm font-normal"></i>
                                                <span class=" text-gray-600 text-xs font-normal"><?= $content['post_watched'] ?></span>
                                            </div>
                                            <div class="flex flex-row items-center gap-1">
                                                <i class="ph-fill  ph-fire text-orange-500 text-sm font-normal"></i>
                                                <span class=" text-orange-500 text-xs font-normal"><?= $content['post_like'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="detail-blog.php?id=<?= $content['post_id'] ?>"
                                        class="text-2xl text-gray-900 font-semibold leading-7 hover:text-[#E20612] transition duration-100"><?= $content['post_title'] ?></a>
                                    <p class="line-clamp-3 text-justify text-gray-700 text-sm leading-5"><?= $content['content_1'] ?></p>
                                    <a href="detail-blog.php?id=<?= $content['post_id'] ?>"
                                        class="w-fit px-5 py-3 bg-sky-400 hover:bg-sky-300 transition duration-150 rounded-sm text-white font-semibold text-sm">Baca
                                        Selengkapnya ></a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <?php include "../display/sidebar.php"
            ?>
        </div>
    </section>

    <?php include "../display/footer.php" ?>
    <!-- news end -->


</body>

</html>