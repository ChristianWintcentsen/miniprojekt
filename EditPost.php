<?php
require_once "/home/mir/lib/db.php";
session_start();
$post = get_post($_GET['post_id']);

if (isset($_POST['Titel'])
&& isset($_POST['Indhold'])) {

  if (modify_post($_GET['post_id'], $_POST['Titel'], $_POST['Indhold'])){
    header('Location:main.php');
    exit;
  }
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
    <?php
    echo '<h3>Titel</h3>';
    echo $post['title'];
    echo '<h3>Indhold</h3>';
    echo $post['content'];
      echo '<br>';
      echo '<br>';
       ?>
       <form class="" action="" method="post">
    <input type="text" name="Titel" value="" placeholder="Ny titel">
    <br>
    <input type="text" name="Indhold" value="" placeholder="Nyt indhold">
    <br>
    <button type="submit" name="">Rediger indlæg</button>
   </form>

  </body>
</html>
