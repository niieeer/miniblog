<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../includes/head.php'); ?>
    <title>Connexion</title>
</head>

<body>
    <?php include_once('../includes/header.php'); ?>
    <div id="formulaireCo">
        <div id="cFormulaire">
            <h2>Se connecter</h2>
            <form action="../controllers/connexion.php" method="post">
                <label>Pseudo :</label>
                <input type="text" name="pseudo" autofocus maxlength="15" pattern="^[a-z0-9]+$" required>
                <label>Mot de passe :</label>
                <input type="password" name="pass" id="" required>
                <input class="sendButton" type="submit" value="Se connecter">
            </form>
        </div>
    </div>
    <?php include_once('../includes/footer.php'); ?>
</body>

</html>