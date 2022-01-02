<?php

    require_once "/home/mir/lib/db.php";


//variabel $post henter og gemmer via metode get_post alt indhold fra post med pid 2 i et array
    $post = get_post($_GET['post']);
//variabel $user henter og gemmer via metode get_user alt indhold fra bruger med uid fra $post
    $user = get_user($post['uid']);

    $commentid = get_cids_by_pid($post['pid']);

    $imageid = get_iids_by_pid($post['pid']);

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
          <input type="submit" name="users" class="btn btn-primary" value="Forside">
            </form>
            <br>

 <b>Bruger:</b>

    <?php

  echo '<a href="https://wits.ruc.dk/~wintcent/wits/miniprojekt/profil.php?user=', $user['uid'], '">';
    echo $user['uid'];
    echo '</a>';
    echo '<br>';
    echo '<br>';
    echo '<h5>Titel: </h5>';
    echo '<p>';
    echo $post['title'];
    echo '</p>';
    echo '<h5>Indhold: </h5>';
    echo '<p>';
    echo $post['content'];
    echo '</p>';
    echo '<h5>Kommentarer:</h5>';
?>
<?php
    foreach ($commentid as $cid){
      $comment = get_comment($cid);
       echo '<a href="https://wits.ruc.dk/~wintcent/wits/miniprojekt/profil.php?user=', $comment['uid'], '">';
      echo $comment['uid'];
      echo '</a>';
        echo '<p>';
      echo $comment['content'];
      echo '</p>';
    }

    foreach ($imageid as $iid){
     $image = get_image($iid);
      echo "<br>";
     //echo $image['iid'];
      echo "<br>";
     //echo $image['path'];
     echo "<br>";
     echo "<img src='", $image['path'],"'>";
  }

  ?>
</div>
      </body>
    </html>
