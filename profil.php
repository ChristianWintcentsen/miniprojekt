<?php

require_once "/home/mir/lib/db.php";

$searcheduser = $_GET['user'];
$user = get_user($searcheduser);

$postid = get_pids_by_uid($user['uid']);

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
    <form class="" action="main.php" method="post">
          <button type="submit" name="login">Forside</button>
        </form>

  </body>
</html>

<?php

echo $user['uid'];
echo "<br>";
foreach ($postid as $pid){
  $post = get_post($pid);
  echo '<a href="https://wits.ruc.dk/~wintcent/wits/miniprojekt/opslag.php?post=', $post['pid'], '">';
  echo $post['title'];
  echo "<br>";
}
 ?>
