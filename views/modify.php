<?php session_start();
require_once("../config/mysql.php");
$mode_edition = 0;
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $mode_edition = 1;
    $edit_id = htmlspecialchars($_GET['id']);
    $edit_article = $connexion->prepare('SELECT * FROM articles WHERE id = ?');
    $edit_article->execute(array($edit_id));
    if ($edit_article->rowCount() == 1) {
        $edit_article = $edit_article->fetch();
    } else {
        die('Erreur : l\'article n\'existe pas...');
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../includes/head.php'); ?>
    <title>Modify</title>
</head>

<body>
    <?php include_once('../includes/header.php'); ?>
    <form action="../controllers/modifyArticle.php" method="post">
        <input type="text" name="title" id="" value="<?= $edit_article['title']; ?>">
        <textarea name="content" id="" cols="30" rows="10"><?= $edit_article['content']; ?></textarea>
        <input type="hidden" name="id" value="<?= $edit_article['id']; ?>">
        <input type="submit" value="Modifier">
    </form>


    <?php include_once('../includes/footer.php'); ?>
</body>

</html>