<?php
require_once "/home/mir/lib/db.php";
session_start();

if (isset($_POST['Titel'], $_POST['Indhold'])) {
  $new_post = add_post($_SESSION['user'], $_POST['Titel'], $_POST['Indhold']);
  $new_image = add_image($_FILES['Billede']['tmp_name'], ".png");

  add_attachment($new_post, $new_image);
  header('Location:main.php');
   exit;

}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <link href="styling.css" rel="stylesheet" />
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Chreddit</h1>
    <form class="" action="" method="POST" enctype="multipart/form-data">
      <input type="text" name="Titel" value="" placeholder="Titel">
      <br>
      <input type="text" name="Indhold" value="" placeholder="Indhold">
      <br>
      <input type="file" name="Billede" accept="image/*">
      <br>
      <button type="submit" name="">Lav indlæg</button>
      <br>
    </form>
    <form class="" action="main.php" method="post">
          <button type="submit" name="login">Forside</button>
        </form>

  </body>
</html>
