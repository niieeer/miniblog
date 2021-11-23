<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Ajout d'articles</title>
</head>

<body>
    <!-- Include du header -->
    <?php include_once('../includes/header.php'); ?>
    <main id="main">
        <form action="../controllers/addarticle.php?type=add" method="POST" id="form-control">
            <input type="hidden" name="user_id" id="user_id" value="<?php if (isset($_SESSION['pseudo'])) {
                                                                        echo $_SESSION['user_id'];
                                                                    } ?>">
            <div>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" required />
            </div>
            <div>
                <label for="content">Ici le contenu de l'article </label>
                <textarea name="content" id="content" required></textarea>
            </div>
            <div>
                <select name="categorie" id="categorie">
                    <option value="1">Héros</option>
                    <option value="2">Avengers</option>
                    <option value="3">Méchants</option>
                </select>
            </div>
            <div id="login_button">
                <input type="submit" value="Ajouter l'article" />
            </div>
            <span>
                <small id="error">
                    <?php if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    } ?>
                </small>
            </span>
        </form>
    </main>
    <!-- Include du footer -->
    <?php include_once('../includes/footer.php'); ?>
</body>

</html>