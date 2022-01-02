<?php
require_once "/home/mir/lib/db.php";
session_start();
//tjekker om parametre er udfyldt og hvis dette er 'true' adder vi indlæg til database
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link href="styling.css" rel="stylesheet" />
    <meta charset="utf-8">
    <title>FrihedensForum</title>
  </head>
  <body>
    <div class='container-fluid'>
    <h1>Frihedens forum</h1>
    <h4>Indlæg</h4>
    <form class="" action="" method="POST" enctype="multipart/form-data">
      <input type="text" name="Titel" value="" placeholder="Titel">
      <br>
      <br>
      <textarea type="text" name="Indhold" value="" placeholder="Indhold"></textarea>
      <br>
      <input type="file" name="Billede" accept="image/*">
      <br>
      <br>
      <input type="submit" name="" class="btn btn-success" value="Lav indlæg">
      <br>
      <br>
    </form>
    <form class="" action="main.php" method="post">
          <input type="submit" name="hpage" class="btn btn-primary" value="Forside">
        </form>
      </div>
  </body>
</html>
