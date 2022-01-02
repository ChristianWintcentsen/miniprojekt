<?php

require_once "/home/mir/lib/db.php";

$searcheduser = $_GET['user'];
$user = get_user($searcheduser);

$postid = get_pids_by_uid($user['uid']);

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
    <form class="" action="main.php" method="post">
          <input type="submit" name="hpage" class="btn btn-primary" value="Forside">
        </form>
        <br>
<?php
echo '<h5>Bruger:</h5>';
echo $user['uid'];
echo '<br>';
echo '<br>';
echo '<h5>Opslag:</h5>';

foreach ($postid as $pid){
  $post = get_post($pid);
  echo '<a href="https://wits.ruc.dk/~wintcent/wits/miniprojekt/opslag.php?post=', $post['pid'], '">';
  echo '<p>';
  echo $post['title'];
  echo '</p>';
}
 ?>
</div>
  </body>
</html>
