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
        <div>
            <h2><?= $articles['title']; ?></h2>
            <p><?= $articles['content']; ?></p>
        </div>
    </main>
    <?php include_once('../includes/footer.php'); ?>
</body>

</html>