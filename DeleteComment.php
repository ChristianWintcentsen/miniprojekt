<?php
require_once "/home/mir/lib/db.php";
session_start();

delete_comment($_POST['comment_id']);

header('Location:main.php');
exit;

 ?>
