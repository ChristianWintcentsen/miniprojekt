<?php
require_once "/home/mir/lib/db.php";
session_start();


if (isset($_POST['kommentar'])) {
  add_comment($_SESSION['user'], $_POST['kommentar_pid'], $_POST['kommentar']);
}

$pids=get_pids();
arsort($pids);

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
    //vi bruger her 'if (!empty($_SESSION['user']' til at tjekke om en bruger er logget ind.
    //hvis brugeren ikke er logget ind kan vedkomne ikke oprette et nyt post
    //dette sker ved at tjekke om 'if (!empty($_SESSION['user']' er emtpy eller ej
    //Hvis 'empty' er 'true' vil det ikke være muligt at oprette indlæg
    if (!empty($_SESSION['user'])) {
    echo '
    <div class="btn-group">
    <form class="" action="NytIndlæg.php" method="post">
          <input type="submit" name="post" class="btn btn-info" value="Lav indlæg">
        </form>
        <br>
        <form class="" action="users.php" method="post">
            <input type="submit" name="users" class="btn btn-secondary" value="Brugere">
        </form>
        <br>
        <form class="" action="logout.php" method="post">
          <input type="submit" name="logout" class="btn btn-danger" value="Log ud">
          <br>
          <br>
        </form>
        </div>
    ';
}
    if (empty($_SESSION['user'])) {
    echo '
    <div class="btn-group">
    <form class="" action="signup.php" method="post">
      <input type="submit" name="signup" class="btn btn-warning" value="Opret bruger">
  </form>
  <br>
  <form class="" action="login.php" method="post">
      <input type="submit" name="login" class="btn btn-success" value="Log ind">
  </form>
  <br>
  <form class="" action="users.php" method="post">
      <input type="submit" name="users" class="btn btn-secondary" value="Brugere">
  </form>
  <br>
  
  <br>
  </div>
      ';
      }
// KØRER ALLE POST ID'S IGENNEM OG HENTER DET POST, DER ER TILKNYTTET DET POST ID.
// ECHO'ER DEREFTER UID, TITLE OG CONTENT
foreach ($pids as $pid) {
  $post = get_post($pid);
  echo '<h5>Bruger:</h5>';
  echo '<p>';
  echo $post['uid'];
  echo '<p>';
  echo '<h5>Titel:</h5>';
  echo '<p>';
  echo $post['title'];
  echo '<p>';
  echo '<h5>Indhold:</h5>';
  echo '<p>';
  echo $post['content'];
  echo '</p>';

  $iids = get_iids_by_pid($pid);

  foreach($iids as $iid) {
    $image = get_image($iid);
    echo '<img src="';
    echo $image['path'];
    echo '" alt="">';
    echo '<h5>Dato:</h5>';
    echo '<p>';
    echo $post['date'];
    echo '</p>';
    echo '<br>';
      }

      if (!empty($_SESSION['user'])){
        if ($post['uid'] == $_SESSION['user']) {
      echo "<form class='' action='EditPost.php' method='GET'>
      <input type='hidden' name='post_id' value='";
      echo $pid;
      echo "'>
        <input type='submit' name='' value='Rediger indlæg'>
      </form>";
    }
      }
 // FOR HVERT POST, SKAL VI OGSÅ HENTE SAMTLIGE KOMMENTARER TILKNYTTET DET POST
 // GET_CIDS_BY_PID HENTER ET ARRAY AF ID'ER PÅ KOMMENTARER, DER ER TILKNYTTET DET POST
  $cids = get_cids_by_pid($pid);
  // VI KØRER ALLE CIDS IGENNEM OG BRUGER GET_COMMENT(det cid vi er nået til)
  // OG ECHOER UID OG CONTENT UD
  foreach($cids as $cid) {
    $comment = get_comment($cid);
    echo '<h5>Kommentar:</h5>';
    echo '<h6>Bruger:</h6>';
    echo '<p>';
    echo $comment['uid'];
    echo '</p>';
    echo '<h6>Indhold:</h6>';
    echo $comment['content'];
    if (!empty($_SESSION['user'])) {
        if ($comment['uid'] == $_SESSION['user'] || $post['uid'] == $_SESSION['user']) {
          echo "<form class='' action='DeleteComment.php' method='POST'>
          <input type='hidden' name='comment_id' value='";
          echo $cid;
          echo "'>
            <input type='submit' name='' value='Slet kommentar'>
          </form>";
        }
      }
    echo "<br>";
  }

  if (!empty($_SESSION['user'])) {
  echo '<form class="" action="" method="POST">
    <input type="text" name="kommentar" value="">
    <input type="hidden" name="kommentar_pid" value="';
    echo $pid;
    echo '">
    <input type="submit" name="" class="btn btn-secondary" value="Tilføj kommentar">
  </form>';
  }

    echo '<br>';
      echo '<br>';
}

 ?>

</div>

  </body>
</html>
