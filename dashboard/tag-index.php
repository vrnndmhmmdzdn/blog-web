<?php
require_once __DIR__ . "/../Model/Model.php";
require_once __DIR__ . "/../Model/Tag.php";
include "component/session.php";
$tags = new Tag();
$limit = 5;
$activePage = (isset($_GET["page"])) ? $_GET["page"] : 1;
$start = ($limit * $activePage) - $limit;
$length = count($tags->GetData());
$countPage = ceil($length / $limit);
$tagsPage = $tags->Paginate($start, $limit);

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Modernize TailwindCSS HTML Admin Template</title>
</head>

<body class="DEFAULT_THEME bg-white">
  <main>
    <!--start the project-->
    <div id="main-wrapper" class=" flex">
      <?php include "component/sidebar.php" ?>
      <div class="w-full page-wrapper overflow-hidden">

        <!--  Header Start -->
        <?php include "component/header.php"
        ?>
        <!--  Header End -->

        <!-- Main Content -->
        <main class="h-full overflow-y-auto  max-w-full  pt-4">
          <div class="container full-container py-5 flex flex-col gap-6">
            <div class="card">
              <div class="card-body flex flex-col gap-6">
                <div class="flex flex-row justify-between items-center">
                  <h6 class="text-lg text-gray-600 font-semibold">Category Pages</h6>

                  <a href="tag-create.php" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-cyan-500 text-cyan-500 hover:border-cyan-500 hover:text-white hover:bg-cyan-500">
                    Add New
                  </a>
                </div>
                <div class="flex flex-row items-center justify-between">
                  <p class="text-sm">List</p>
                  <form action="" method="post" class="flex flex-row gap-1">
                    <label for="input-label-with-helper-text"
                      class="block text-sm font-semibold mb-2 text-gray-600"></label>
                    <input type="text" id="search" name="search" id="input-label-with-helper-text"
                      class="py-2 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-600 focus:ring-0 "
                      placeholder="Search tag" aria-describedby="hs-input-helper-text">
                    <button type="button" name="searchBtn" class="px-3 inline-flex items-center gap-x-2 text-xs font-semibold rounded-md border border-blue-600 text-blue-600 hover:border-blue-600 hover:text-white hover:bg-blue-600">
                      Search
                    </button>
                  </form>
                </div>
                <div class="col-span-2">
                  <div class="card h-full">
                    <div class="card-body">
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
                            <?php foreach ($tagsPage as $tag): ?>
                              <tr>
                                <td class="p-4 font-semibold text-gray-600 "><?= $i + $start ?></td>
                                <td class="p-4 font-semibold text-gray-600 "><?= $tag["tag_id"] ?></td>
                                <td class="p-4 font-normal text-sm text-gray-500">
                                  <?= $tag["tag_name"] ?>
                                </td>
                                <td class="p-4 flex flex-row gap-3">
                                  <a href="tag-edit.php?id=<?= $tag['tag_id'] ?>" class=" py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-teal-500 text-white hover:bg-teal-600">Edit</a>
                                  <button onclick="trash(event,'<?= $tag['tag_id'] ?>')" class=" py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-red-500 text-white hover:bg-red-600">Delete</button>
                                </td>
                              </tr>
                              <?php $i++ ?>
                            <?php endforeach ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex gap-2">
              <?php $prevDis = ($activePage == 1) ? "disabled" : ""; ?>
              <div <?= $prevDis ?>>
                <?php $prev = ($activePage == 1) ? 1 : $activePage - 1; ?>
                <a href="?page=<?= $prev ?>" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border text-gray border-gray-700 hover:border-gray-700 hover:text-white hover:bg-gray-700">
                  Prev
                </a>
              </div>
              <?php for ($i = 1; $i <= $countPage; $i++) : ?>
                <?php $active = ($activePage == $i) ? "border-gray-700" : ""; ?>
                <a href="?page=<?= $i ?>" class="<?= $active ?> py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border text-gray hover:border-gray-700 hover:text-white hover:bg-gray-700">
                  <?= $i ?>
                </a>
              <?php endfor ?>
              <?php $nextDis = ($activePage == $countPage) ? "disabled" : ""; ?>
              <div <?= $nextDis ?>>
                <?php $next = ($activePage == $countPage) ? $countPage : $activePage + 1; ?>
                <a href="?page=<?= $next ?>" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border text-gray border-gray-700 hover:border-gray-700 hover:text-white hover:bg-gray-700">
                  Next
                </a>
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

  <script>
    $('#search').on('keyup', function() {
      $('#liveSearch').load(`./component/liveSearch/tag.php?key=` + $('#search').val());
    });

    function trash(e, id) {
      e.preventDefault();
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
      });
      swalWithBootstrapButtons.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `component/tag-delete.php?id=${id}`
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire({
            title: "Cancelled",
            text: "Your imaginary file is safe :)",
            icon: "error"
          });
        }
      });
    }
  </script>

</body>

</html>