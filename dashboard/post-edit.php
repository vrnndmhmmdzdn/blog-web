<?php
require_once __DIR__ . "/../Model/Model.php";
require_once __DIR__ . "/../Model/Post.php";
include "component/session.php";
$posts = new Post();
$id = $_GET['id'];
if (empty($id)) {
    header("location: category-index.php");
}
if (isset($_POST['submit'])) {
    $datas = [
        "post" => $_POST,
        "files" => $_FILES
    ];
    $result = $categories->Update($id, $datas);
    if ($result) {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'center-center',
                icon: 'success',
                title: 'Successfully edited category',
                showConfirmButton: false,
                timer: 2000
            });
            setTimeout(() => {
                window.location.href = 'category-index.php';
            }, 2000)
        })
    </script>";
    } else {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'center-center',
                icon: 'error',
                title: 'failed to edit',
                showConfirmButton: false,
                timer: 2000
            });
            setTimeout(() => {
                window.location.href = 'category-index.php';
            }, 2000)
        })
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="../dist/assets/images/logos/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="../dist/assets/css/theme.css" />
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Modernize TailwindCSS HTML Admin Template</title>
</head>

<body class="DEFAULT_THEME bg-white">
    <main>
        <!--start the project-->
        <div id="main-wrapper" class=" flex">
            <?php include "component/sidebar.php";
            ?>
            <div class="w-full page-wrapper overflow-hidden">

                <!--  Header Start -->
                <?php include "component/header.php";
                ?>
                <!--  Header End -->

                <!-- Main Content -->
                <main class="h-full overflow-y-auto  max-w-full  pt-4">
                    <div class="container full-container py-5 flex flex-col gap-6">
                        <div class="card">
                            <div class="card-body flex flex-col gap-6">
                                <h6 class="text-2xl text-gray-600 font-semibold">Post</h6>
                                <p class="text-sm">Insert new acticle</p>
                                <div class="card">
                                    <div class="card-body">
                                        <form class="flex flex-col gap-6" enctype="multipart/form-data" action="" method="post">
                                            <?php foreach ($posts as $post): ?>
                                                <p class="text-xl  text-gray-800 mt-2" id="hs-input-helper-text">Title</p>
                                                <div>
                                                    <label for="input-label-with-helper-text"
                                                        class="block text-sm font-semibold mb-2 text-gray-600">Title of article</label>
                                                    <input type="text" name="post_title" id="input-label-with-helper-text" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                        aria-describedby="hs-input-helper-text">
                                                </div>
                                                <p class="text-xl  text-gray-500 mt-2" id="hs-input-helper-text">First paragraph (1)</p>
                                                <div>
                                                    <label for="input-label-with-helper-text"
                                                        class="block text-sm font-semibold mb-2 text-gray-600">Title 1</label>
                                                    <input type="text" name="head_1" id="input-label-with-helper-text"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                        aria-describedby="hs-input-helper-text">
                                                </div>
                                                <div>
                                                    <label for="input-label-with-helper-text"
                                                        class="block text-sm font-semibold mb-2 text-gray-600">Image 1</label>
                                                    <input type="file" name="img_1" id="input-label-with-helper-text" required
                                                        class="py-3 px-4 border block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                        aria-describedby="hs-input-helper-text">
                                                </div>
                                                <div>
                                                    <label for="input-label-with-helper-text"
                                                        class="block text-sm font-semibold mb-2 text-gray-600">Content 1</label>
                                                    <textarea type="text" name="content_1" id="input-label-with-helper-text" style="height: 200px;"
                                                        class="w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                        aria-describedby="hs-input-helper-text"></textarea>
                                                </div>

                                                <p class="text-xl  text-gray-500 mt-2" id="hs-input-helper-text">Secong paragraph (2)</p>
                                                <div>
                                                    <label for="input-label-with-helper-text"
                                                        class="block text-sm font-semibold mb-2 text-gray-600">Title 2</label>
                                                    <input type="text" name="head_2" id="input-label-with-helper-text"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                        aria-describedby="hs-input-helper-text">
                                                </div>
                                                <div>
                                                    <label for="input-label-with-helper-text"
                                                        class="block text-sm font-semibold mb-2 text-gray-600">Content 2</label>
                                                    <textarea type="text" name="content_2" id="input-label-with-helper-text" style="height: 200px;"
                                                        class="w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                        aria-describedby="hs-input-helper-text">
                                                </textarea>
                                                </div>
                                                <p class="text-xl  text-gray-500 mt-2" id="hs-input-helper-text">Third paragraph (3)</p>
                                                <div>
                                                    <label for="input-label-with-helper-text"
                                                        class="block text-sm font-semibold mb-2 text-gray-600">Title 3</label>
                                                    <input type="text" name="head_3" id="input-label-with-helper-text"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                        aria-describedby="hs-input-helper-text">
                                                </div>
                                                <div>
                                                    <label for="input-label-with-helper-text"
                                                        class="block text-sm font-semibold mb-2 text-gray-600">Content 3</label>
                                                    <textarea type="text" name="content_3" id="input-label-with-helper-text" style="height: 200px;"
                                                        class="w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                        aria-describedby="hs-input-helper-text">
                                                </textarea>
                                                </div>
                                                <div>
                                                    <label for="input-label-with-helper-text"
                                                        class="block text-sm font-semibold mb-2 text-gray-600">Category</label>
                                                    <select type="text" id="input-label-with-helper-text" name="category"
                                                        class="w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                        aria-describedby="hs-input-helper-text">
                                                        <?php foreach ($categories->GetData() as $category): ?>
                                                            <option value="<?= $category['category_id'] ?>"><?= $category['category_name'] ?></option>
                                                        <?php endforeach ?>
                                                        <select>
                                                </div>
                                                <div>
                                                    <label for="input-label-with-helper-text"
                                                        class="block text-sm font-semibold mb-2 text-gray-600">Tag</label>
                                                    <select type="text" id="input-label-with-helper-text" name="tag"
                                                        class="w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                        aria-describedby="hs-input-helper-text">
                                                        <?php foreach ($tags->GetData() as $tag): ?>
                                                            <option value="<?= $tag['tag_id'] ?>"><?= $tag['tag_name'] ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>

                                                <button name="submit" class="btn text-sm text-white font-medium w-fit hover:bg-blue-700">Submit</button>
                                            <?php endforeach ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>


    </main>
    <!-- Main Content End -->

    </div>
    </div>
    <!--end of project-->
    </main>



    <script src="../dist/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../dist/assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../dist/assets/libs/iconify-icon/dist/iconify-icon.min.js"></script>
    <script src="../dist/assets/libs/@preline/dropdown/index.js"></script>
    <script src="../dist/assets/libs/@preline/overlay/index.js"></script>
    <script src="../dist/assets/js/sidebarmenu.js"></script>

</body>

</html>