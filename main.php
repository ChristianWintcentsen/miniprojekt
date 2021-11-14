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
    <link href="styling.css" rel="stylesheet" />
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<h1>Chreddit</h1>

    <?php
    //vi bruger her 'if (!empty($_SESSION['user']' til at tjekke om en bruger er logget ind.
    //hvis brugeren ikke er logget ind kan vedkomne ikke oprette et nyt post
    //dette sker ved at tjekke om 'if (!empty($_SESSION['user']' er emtpy eller ej
    //Hvis 'empty' er 'true' vil det ikke være muligt at oprette indlæg
    if (!empty($_SESSION['user'])) {
    echo '
    <form class="" action="NytIndlæg.php" method="post">
          <button type="submit" name="login">Lav indlæg</button>
        </form>
        <br>
        <form class="" action="users.php" method="post">
            <button type="submit" name="signup">Brugere</button>
        </form>
        <br>
        <form class="" action="logout.php" method="post">
          <input type="submit" name="" value="Log ud">
          <br>
          <br>
        </form>
    ';
}
    if (empty($_SESSION['user'])) {
    echo '
    <form class="" action="signup.php" method="post">
      <button type="submit" name="signup">Opret bruger</button>
  </form>
  <br>
  <form class="" action="login.php" method="post">
      <button type="submit" name="signup">Log ind</button>
  </form>
  <br>
  <form class="" action="users.php" method="post">
      <button type="submit" name="signup">Brugere</button>
  </form>
  <br>
      ';
      }
// KØRER ALLE POST ID'S IGENNEM OG HENTER DET POST, DER ER TILKNYTTET DET POST ID.
// ECHO'ER DEREFTER UID, TITLE OG CONTENT
foreach ($pids as $pid) {
  $post = get_post($pid);
  echo $post['uid'];
  echo '<br>';
  echo $post['title'];
  echo '<br>';
  echo $post['content'];
  echo '<br>';


  $iids = get_iids_by_pid($pid);

  foreach($iids as $iid) {
    $image = get_image($iid);
    echo '<img src="';
    echo $image['path'];
    echo '" alt="">';
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
    echo $comment['uid'];
    echo "<br>";
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
    <input type="submit" name="" value="Tilføj kommentar">
  </form>';
  }

    echo '<br>';
      echo '<br>';
}

 ?>



  </body>
</html>
