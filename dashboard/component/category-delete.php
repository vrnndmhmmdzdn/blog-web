<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require_once __DIR__ . "/../../Model/Model.php";
require_once __DIR__ . "/../../Model/Category.php";
$id = $_GET['id'];
if (empty($id)) {
    header("location : ../category-index.php");
}
$delete = new Category();
$delete->Delete($id);
if ($delete) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'center-center',
                icon: 'success',
                title: 'Successfully deleted category',
                showConfirmButton: false,
                timer: 2000
            });
            setTimeout(() => {
                window.location.href = '../category-index.php';
            }, 2000)
        })
    </script>";
} else {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'center-center',
                icon: 'error',
                title: 'failed to delete',
                showConfirmButton: false,
                timer: 2000
            });
            setTimeout(() => {
                window.location.href = '../category-index.php';
            }, 2000)
        })
        </script>";
}
