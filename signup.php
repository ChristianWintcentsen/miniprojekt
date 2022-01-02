<?php
require_once "/home/mir/lib/db.php";
//tjekker om parametre er udfyldt og hvis dette er 'true' adder vi user til database
if (isset($_POST['firstname'])
&& isset($_POST['lastname'])
&& isset($_POST['newuname'])
&& isset($_POST['newpword'])) {
//kører funktion og hvis den retunerer 'true' bliver bruger sendt til main.php
  if (add_user($_POST['newuname'], $_POST['firstname'], $_POST['lastname'], $_POST['newpword'])){
    header('Location:main.php');
    exit;
  }

}
//form hvor brugeroplysiger udfyldes, samt parametre navngives.
//Post bruges da vi modificerer databaseindhold
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="styling.css" rel="stylesheet" />
    <meta charset="utf-8">
    <title>Blog</title>
  </head>
  <body>
    <div class='container-fluid'>
    <h1>Frihedens forum</h1>

    <form class="" action="" method="post">
      <input type="text" name="firstname" value="" placeholder="Fornavn">
      <br>
      <input type="text" name="lastname" value="" placeholder="Efternavn">
      <br>
      <input type="text" name="newuname" value="" placeholder="Brugernavn">
      <br>
      <input type="password" name="newpword" value="" placeholder="Adgangskode">
      <br>
      <br>
      <input type="submit" name="newuser" class="btn btn-success" value="Opret bruger">
      <br>
  </form>
  <br>
  <form class="" action="main.php" method="post">
        <input type="submit" name="hpage" class="btn btn-primary" value="Forside">
      </form>
    </div>
</body>
</html>
