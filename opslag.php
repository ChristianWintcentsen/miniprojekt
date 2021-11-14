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

  echo '<a href="https://wits.ruc.dk/~wintcent/wits/miniprojekt/profil.php?user=', $user['uid'], '">';
echo $user['firstname'];
    echo $user['lastname'];
    echo '</a>';
    echo "<br>";
    echo $post['title'];
    echo "<br>";
    echo $post['content'];

    foreach ($commentid as $cid){
      $comment = get_comment($cid);
       echo "<br>";
       echo "<br>";
       echo '<a href="https://wits.ruc.dk/~wintcent/wits/miniprojekt/profil.php?user=', $comment['uid'], '">';
      echo $comment['uid'];
      echo '</a>';
        echo "<br>";
      echo $comment['content'];
    }

    foreach ($imageid as $iid){
     $image = get_image($iid);
      echo "<br>";
     echo $image['iid'];
      echo "<br>";
     echo $image['path'];
     echo "<br>";
     echo "<img src='", $image['path'],"'>";


    }

  ?>
