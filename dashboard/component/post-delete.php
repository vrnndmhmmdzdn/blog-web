<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require_once __DIR__ . "/../../Model/Model.php";
require_once __DIR__ . "/../../Model/Post.php";
$id = $_GET['id'];
if (!isset($id)) {
    header("location : ../post-index.php");
}
$post = new Post();
$post->Delete($id);
if ($post) {
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                position: 'center-center',
                icon: 'success',
                title: 'Successfully deleted post',
                showConfirmButton: false,
                timer: 2000
            });
            setTimeout(() => {
                window.location.href = '../post-index.php';
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
                window.location.href = '../post-index.php';
            }, 2000)
        })
        </script>";
}
