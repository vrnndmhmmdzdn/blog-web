<?php
require_once __DIR__ . "/../../../Model/Model.php";
require_once __DIR__ . "/../../../Model/Tag.php";
$tags = new Tag();
$key = $_GET['key'];
$limit = 3;
$activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$start = ($limit * $activePage) - $limit;
$length = count($tags->GetData());
$countPage = ceil($length / $limit);

$tagsPage = $tags->LiveSearch($key, $start, $limit);

?>
<div id="liveSearch" class="relative overflow-x-auto">
    <!-- table -->
    <table class="text-left w-full whitespace-nowrap text-sm">
        <thead class="text-gray-700">
            <tr class="font-semibold text-gray-600">
                <th scope="col" class="p-4">No</th>
                <th scope="col" class="p-4">Id</th>
                <th scope="col" class="p-4">Name</th>
                <th scope="col" class="p-4">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($tagsPage as $category): ?>
                <tr>
                    <td class="p-4 font-semibold text-gray-600 "><?= $i + $start ?></td>
                    <td class="p-4 font-semibold text-gray-600 "><?= $category["tag_id"] ?></td>
                    <td class="p-4 font-normal text-sm text-gray-500">
                        <?= $category["tag_name"] ?>
                    </td>
                    <td class="p-4 flex flex-row gap-3">
                        <a href="tag-edit.php?id=<?= $category['tag_id'] ?>" class=" py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-teal-500 text-white hover:bg-teal-600">Edit</a>
                        <button onclick="trash(event,'<?= $category['tag_id'] ?>')" class=" py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-red-500 text-white hover:bg-red-600">Delete</button>
                    </td>
                </tr>
                <?php $i++ ?>
            <?php endforeach ?>
        </tbody>
    </table>
</div>