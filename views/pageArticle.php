<?php session_start();
require("../config/mysql.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $sql = "SELECT * FROM articles WHERE id =" . $_GET['id'];
    $req = $connexion->prepare($sql);
    $req = $connexion->query($sql);
    $articles = $req->fetch();
} else {
    Header('Location: http://localhost/miniBlog/index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../includes/head.php'); ?>
    <title><?= $articles['title']; ?></title>
</head>

<body>
    <?php include_once('../includes/header.php'); ?>
    <main>
        <div id="nContainer">
            <div id="aNext">
                <div id="harticle">
                    <h2><?= $articles['title']; ?></h2>
                    <div class="italic">
                        <p>2019/15/31</p>
                    </div>
                </div>
                <p id="aContent"><?= $articles['content']; ?></p>
                <div id="infoArticle">
                    <div>
                        <p id="aBold"><i class="fas fa-user-tie"></i> Clément et Maxime</p>
                    </div>
                    <div class="separator"></div>
                    <div>
                        <p> <i class="fas fa-icons"> </i> Pavé de merde </p>
                    </div>

                </div>
            </div>

        </div>
    </main>
    <?php include_once('../includes/footer.php'); ?>
</body>

</html>