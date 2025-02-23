<?php
require_once __DIR__ . "/../Model/Model.php";
require_once __DIR__ . "/../Model/User.php";
if (isset($_SESSION['user_id'])) {
    header("location : index.php");
}
$users = new User();
if (isset($_POST['register'])) {
    $datas = [
        'post' => $_POST,
        'files' => $_FILES
    ];
    //var_dump($datas);
    $register = $users->Register($datas);
    if (gettype($register) == "string") {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'center-center',
                icon: 'error',
                title: `{$register}`,
                showConfirmButton: false,
                timer: 2000
            });
            setTimeout(() => {
                window.location.href = 'register.php';
            }, 2000)
        })
        </script>";
    } else {
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'center-center',
                icon: 'success',
                title: 'Successfully register',
                showConfirmButton: false,
                timer: 2000
            });
            setTimeout(() => {
                window.location.href = 'index.php';
            }, 2000)
        })
    </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="../dist../assets/images/logos/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="../dist../assets/css/theme.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Modernize TailwindCSS HTML Admin Template</title>
</head>

<body class="DEFAULT_THEME bg-white">
    <main>
        <!-- Main Content -->
        <div class="flex flex-col w-full  overflow-hidden relative min-h-screen radial-gradient items-center justify-center g-0 px-4">

            <div class="justify-center items-center w-full card lg:flex max-w-md ">
                <div class=" w-full card-body">
                    <a href="../" class="py-4 block"><img src="../dist../assets/images/logos/dark-logo.svg" alt="" class="mx-auto" /></a>
                    <p class="mb-4 text-gray-500 text-sm text-center">Your Social Campaigns</p>
                    <!-- form -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- username -->
                        <div class="mb-4">
                            <label for="forName"
                                class="block text-sm font-semibold mb-2 text-gray-600">Username</label>
                            <input type="text" id="forName" name="user_name"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                        </div>
                        <!-- Email -->
                        <div class="mb-4">
                            <label for="forEmail"
                                class="block text-sm font-semibold mb-2 text-gray-600">Email Address</label>
                            <input type="email" id="forEmail" name="user_email"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                        </div>
                        <!-- password -->
                        <div class="mb-4">
                            <label for="forPassword"
                                class="block text-sm font-semibold mb-2 text-gray-600">Password</label>
                            <input type="password" id="forPassword" name="user_password"
                                class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                        </div>
                        <div class="mb-4">
                            <label for="forImg"
                                class="block text-sm font-semibold mb-2 text-gray-600">Image profile</label>
                            <input type="file" id="forImg" name="user_img" required
                                class="py-3 border px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text">
                        </div>
                        <!-- author / user -->
                        <div class="flex">
                            <input type="checkbox" name="role" class="shrink-0 mt-0.5 border-gray-200 rounded-[4px] text-blue-600 focus:ring-blue-500 " id="hs-default-checkbox">
                            <label for="hs-default-checkbox" class="text-sm text-gray-600 ms-3">Register as Admin</label>
                        </div>

                        <!-- button -->
                        <div class="grid my-6">
                            <button name="register" class="btn py-[10px] text-base text-white font-medium hover:bg-blue-700">Sign Up</button>
                        </div>

                        <div class="flex justify-center gap-2 items-center">
                            <p class="text-base font-medium text-gray-500">Already have an Account?</p>
                            <a href="login.php" class="text-sm font-medium text-blue-600 hover:text-blue-700">Sign In</a>
                        </div>
                </div>
                </form>
            </div>
        </div>

        </div>
        <!--end of project-->
    </main>



    <script src="../dist../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../dist../assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../dist../assets/libs/iconify-icon/dist/iconify-icon.min.js"></script>
    <script src="../dist../assets/libs/@preline/dropdown/index.js"></script>
    <script src="../dist../assets/libs/@preline/overlay/index.js"></script>
    <script src="../dist../assets/js/sidebarmenu.js"></script>



</body>

</html>