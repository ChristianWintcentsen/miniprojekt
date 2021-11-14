<?php
require_once "/home/mir/lib/db.php";

$uids = get_uids();

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

foreach ($uids as $uid){

    echo '<a href="https://wits.ruc.dk/~wintcent/wits/miniprojekt/profil.php?user=', $uid, '">';
    echo $uid;
  echo "<br>";
}
 ?>
