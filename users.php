<?php
require_once "/home/mir/lib/db.php";

$uids = get_uids();

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
    <h3>Brugere:</h3>
<?php
//løkken kører igennem alle elementer i arrayet, hvorefter disse bliver echoet
foreach ($uids as $uid){
    echo '<a href="https://wits.ruc.dk/~wintcent/wits/miniprojekt/profil.php?user=', $uid, '">';
    echo '<p>';
    echo $uid;
    echo '</p>';

}
 ?>
 </div>
</body>
</html>
