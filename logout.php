<?php
session_start();

session_destroy();
//Stopper den nuværende session og sender brugeren til login.php
header('Location:login.php');
exit;
?>
