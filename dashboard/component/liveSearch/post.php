<?php
require_once __DIR__ . "/../../../Model/Model.php";
require_once __DIR__ . "/../../../Model/Post.php";
$posts = new Post();
$key = $_GET['key'];
$limit = 3;
$activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$start = ($limit * $activePage) - $limit;
$length = count($posts->GetData());
$countPage = ceil($length / $limit);

$postsPage = $posts->LiveSearch($key, $start, $limit);

?>
<div id="liveSearch" class="relative overflow-x-auto">
    <!-- table -->
    <table class="text-left w-full whitespace-nowrap text-sm">
        <thead class="text-gray-700">
            <tr class="font-semibold text-gray-600">
                <th scope="col" class="p-4">No</th>
                <th scope="col" class="p-4">Title</th>
                <th scope="col" class="p-4">Author</th>
                <th scope="col" class="p-4">Image</th>
                <th scope="col" class="p-4">Watched</th>
                <th scope="col" class="p-4">Like</th>
                <th scope="col" class="p-4">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($postsPage as $post): ?>
                <tr>
                    <td class="p-4 font-semibold text-gray-600 "><?= $i + $start ?></td>
                    <!-- <td class="p-4 font-semibold text-gray-600 "><?= $post["post_id"] ?></td> -->
                    <td class="p-4 font-normal text-sm text-gray-500">
                        <?= $post["post_title"] ?>
                    </td>
                    <td class="p-4 font-normal text-sm text-gray-500">
                        <?= $post['user_name'] ?>
                    </td>
                    <td class="p-4 ">
                        <button onclick="showImage(event,'<?= $post['img_1'] ?>','<?= $post['img_1'] ?>')">
                            <span class="font-normal text-sm text-gray-500 underline"><?= $post["img_1"] ?></span>
                        </button>
                    </td>
                    <td class="p-4 font-normal text-sm text-gray-500">
                        <?= $post["post_watched"] ?>
                    </td>
                    <td class="p-4 font-normal text-sm text-gray-500">
                        <?= $post["post_like"] ?>
                    </td>
                    <td class="p-4 flex flex-row gap-1">
                        <a href="?id=<?= $post['post_id'] ?>" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-blue-300 text-white hover:bg-blue-400">Detail</a>
                        <a href="post-edit.php?id=<?= $post['post_id'] ?>" class=" py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-teal-500 text-white hover:bg-teal-600">Edit</a>
                        <button onclick="trash(event,'<?= $post['post_id'] ?>')" class=" py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-red-500 text-white hover:bg-red-600">Delete</button>
                    </td>
                </tr>
                <?php $i++ ?>
            <?php endforeach ?>
        </tbody>
    </table>
</div>