<?php
require_once __DIR__ . "/../Model/Model.php";
require_once __DIR__ . "/../Model/Category.php";
include "component/session.php";
$categories = new Category();
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
                                <h6 class="text-lg text-gray-600 font-semibold">Category</h6>
                                <p class="text-sm">Insert new acticle cateogory</p>
                                <div class="card">
                                    <div class="card-body">
                                        <form class="flex flex-col gap-6" enctype="multipart/form-data" action="" method="post">
                                            <?php foreach ($categories->Select($id) as $category): ?>
                                                <div>
                                                    <label for="input-label-with-helper-text"
                                                        class="block text-sm font-semibold mb-2 text-gray-600">Category Name</label>
                                                    <input type="text" name="category_name" id="input-label-with-helper-text" value="<?= $category['category_name'] ?>"
                                                        class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                        aria-describedby="hs-input-helper-text">
                                                    <p class="text-sm  text-gray-500 mt-2" id="hs-input-helper-text">Change to new category</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
                                                        <div class="flex flex-col gap-6">
                                                            <div class="card overflow-hidden">
                                                                <div class=" bg-white">
                                                                    <img class="w-full h-auto rounded-t-xl" src="../public/img/<?= $category['icon'] ?>"
                                                                        alt="Image Description">
                                                                    <div class="card-body">
                                                                        <p class="mt-1 text-sm text-gray-500 pr-10 ">
                                                                            Current icon
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="input-label-with-helper-text"
                                                        class="block text-sm font-semibold mb-2 text-gray-600">Icon <span class="text-sm font-light text-gray-500">(optional)</span></label>
                                                    <input type="file" name="icon" id="input-label-with-helper-text"
                                                        class="py-3 px-4 border block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                                                        aria-describedby="hs-input-helper-text">
                                                </div>
                                            <?php endforeach ?>
                                            <button name="submit" class="btn text-sm text-white font-medium w-fit hover:bg-blue-700">Submit</button>
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