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
//Vi bruger POST, selvom man normalt bruger GET hvis man ikke skal redigere,
//da informationen skal holdes hemmeligt, og GET viser informationen i URL'en
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="styling.css" rel="stylesheet" />
    <meta charset="utf-8">
    <title>FrihedensForum</title>
  </head>
  <body>
    <div class='container-fluid'>
    <h1>Frihedens forum</h1>
    <form class="" action="" method="post">
      <input type="text" name="username" value="" placeholder="Brugernavn">
      <br>
      <input type="password" name="password" value="" placeholder="Adgangskode">
      <br>
      <br>
      <input type="submit" class="btn btn-success" name="login" value="Log ind">
<br>
<br>
</form>
<form class="" action="main.php" method="post">
      <input type="submit" class="btn btn-primary" value="Forside" name="hpage">
    </form>
  </div>
  </body>
</html>
