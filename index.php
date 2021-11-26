<?php session_start();
require("./config/mysql.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('./includes/head.php'); ?>
    <title>From Looser to Master</title>
</head>

<body>
    <?php include_once('./includes/header.php'); ?>
    <main>
        <div id="main">
            <?php

            $req = $connexion->prepare('SELECT id, title, content FROM articles WHERE is_DELETED =0 ORDER BY id DESC LIMIT 6');
            $req->execute();
            // 
            $articles = $req->fetchAll();



            foreach ($articles as $article) {
            ?>
                <div class="articleContainer">
                    <h2><?php echo $article["title"]; ?></h2>
                    <p><?php echo substr($article["content"], 0, 400); ?>... </p>
                    <div class="infoarticle">
                        <a class="" href="./views/pageArticle.php?id=<?= $article["id"] ?>">Lire la suite</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>
    <?php include_once('./includes/footer.php'); ?>
</body>


</html>