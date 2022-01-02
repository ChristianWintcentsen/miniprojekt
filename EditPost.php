<?php
require_once "/home/mir/lib/db.php";
session_start();
$post = get_post($_GET['post_id']);
//tjekker om parametre er udfyldt og hvis dette er 'true' ændres paramatre i database
if (isset($_POST['Titel'])
&& isset($_POST['Indhold'])) {
//kører funktion og hvis den retunerer 'true' bliver bruger sendt til main.php
  if (modify_post($_GET['post_id'], $_POST['Titel'], $_POST['Indhold'])){
    header('Location:main.php');
    exit;
  }
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
    <?php
    echo '<h3>Titel</h3>';
    echo '<p>';
    echo $post['title'];
    echo '</p>';
    echo '<h3>Indhold</h3>';
    echo '<p>';
    echo $post['content'];
    echo '</p>';
      echo '<br>';
       ?>
       <form class="" action="" method="post">
    <input type="text" name="Titel" value="" placeholder="Ny titel">
    <br>
    <br>
    <textarea type="text" name="Indhold" value="" placeholder="Nyt indhold"></textarea>
    <br>
    <input type="submit" name="" class="btn btn-success" value="Rediger indlæg">
   </form>
 </div>
  </body>
</html>
