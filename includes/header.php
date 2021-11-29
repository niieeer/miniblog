<header>
    <span class="headtitle"><a href="http://localhost/miniBlog/index.php">From looser to Master</a></span>
    <nav>
        <a href="http://localhost/miniBlog/views/pageArticle.php"><i class="far fa-newspaper"></i> Articles</a>
        <?php if (isset($_SESSION['pseudo'])) { ?>
            <a href="http://localhost/miniBlog/views/pageAjoutArticles.php"><i class="fas fa-plus-square"></i> Ajouter un Article</a>
        <?php  } ?>

        <?php if (!isset($_SESSION['pseudo'])) { ?>
            <a href="http://localhost/miniBlog/views/pageInscription.php"><i class="fas fa-user-plus"></i> Inscription</a>
            <a href="http://localhost/miniBlog/views/pageConnexion.php"><i class="fas fa-sign-in-alt"></i> Connexion</a>
        <?php  } ?>
        <?php if (isset($_SESSION['pseudo'])) { ?>
            <a href="http://localhost/miniBlog/controllers/deconnexion.php"><i class="fas fa-sign-out-alt"></i> Deconnexion</a>
            <a href="http://localhost/miniBlog/views/pageAdmin.php">Admin</a>
        <?php  } ?>
    </nav>
</header>