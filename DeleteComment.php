<?php
require_once "/home/mir/lib/db.php";
session_start();

delete_comment($_POST['comment_id']);
//fjerner den pågældende kommentar fra indlægget og genindlæser mian.php
header('Location:main.php');
exit;

 ?>
