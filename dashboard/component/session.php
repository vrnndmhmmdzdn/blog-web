<?php
if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
}
if ($_SESSION['role'] == 'author') {
    header("location: post-create.php");
}
$author = ($_SESSION['role'] == 'author') ? 'hidden' : '';
