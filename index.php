<?php session_start();
require("./config/mysql.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>From Looser to Master</title>
</head>

<body>
    <?php include_once('./includes/header.php'); ?>
    <main>
        <div id="main">
            <?php

            $req = $connexion->prepare('SELECT title, content FROM articles  WHERE is_DELETED =0 ORDER BY id DESC LIMIT 6');
            $req->execute();
            $articles = $req->fetchAll();



            foreach ($articles as $article) {
            ?>

                <div class="articleContainer">
                    <h2><?php echo $article["title"]; ?></h2>
                    <p><?php echo substr($article["content"], 0, 400); ?>... </p>
                    <a class="Ahref" href="">Lire la suite</a>
                </div>
            <?php
            }
            ?>
        </div>
    </main>
    <?php include_once('./includes/footer.php'); ?>
</body>


</html>