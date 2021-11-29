<?php session_start();
require_once('../config/mysql.php');
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM articles WHERE user_id = $user_id AND is_DELETED =0 ORDER BY id DESC ";
$req = $connexion->prepare($sql);
$req = $connexion->query($sql);
$req->execute();
// 
$articles = $req->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../includes/head.php'); ?>
    <title>Admin</title>
</head>

<body>
    <?php include_once('../includes/header.php'); ?>
    <main>
        <div id="adminContainer">
            <?php
            foreach ($articles as $article) {
            ?>
                <div class="articleContainer">
                    <form action="" method="post">
                        <h2><?php echo $article["title"]; ?></h2>
                        <p><?php echo substr($article["content"], 0, 400); ?>... </p>
                        <div class="navarticle">
                            <a href="./modify.php?id=<?= $article['id'] ?>">Modifier l'article</a>
                            <a href="../controllers/delete.php?id=<?= $article['id'] ?>" onclick="return confirm('Delete this article?')">Delete</a>
                        </div>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </main>
    <?php include_once('../includes/footer.php');
    ?>

</body>

</html>