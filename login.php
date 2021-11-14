<?php
session_start();
require_once "/home/mir/lib/db.php";


  if (login($_POST['username'], $_POST['password'])){
    $_SESSION['user'] = $_POST['username'];
   header('Location:main.php');
    exit;
  }
  else if (isset($_POST['username'])){
    echo 'Brugeren findes ikke';
  }
//Vi TEST bruger POST, selvom man normalt bruger GET hvis man ikke skal redigere,
//da informationen skal holdes hemmeligt, og GET viser informationen i URL'en
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="styling.css" rel="stylesheet" />
    <meta charset="utf-8">
    <title>Blog</title>
  </head>
  <body>
    <h1>Chreddit</h1>

    <form class="" action="" method="post">
      <input type="text" name="username" value="" placeholder="Brugernavn">
      <br>
      <input type="password" name="password" value="" placeholder="Adgangskode">
      <br>
      <button type="submit" name="login">Log ind</button>
<br>
</form>
<form class="" action="main.php" method="post">
      <button type="submit" name="login">Forside</button>
    </form>
  </body>
</html>
