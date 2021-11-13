<?php
require_once "/home/mir/lib/db.php";
session_start();
//denne funktion gør at man ikke kan tilgå main.php hvis man ikke er logget ind
if (empty($_SESSION['user'])){
  header('Location:main.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="logout.php" method="post">
      <input type="submit" name="" value="Logout">
    </form>

  </body>
</html>
