<header>
    <span class="headtitle"><a href="../index.php">From looser to Master</a></span>
    <nav>
        <a href="./vues/articles/articles.html">Articles</a>
        <a href="./views/pageAjoutArticles.php">Ajouter un Article</a>
        <?php if (!isset($_SESSION['pseudo'])) { ?>
            <a href="./views/pageInscription.php">Inscription</a>
            <a href="./views/pageConnexion.php">Connexion</a>
        <?php  } ?>
        <?php if (isset($_SESSION['pseudo'])) { ?>
            <a href="./controllers/deconnexion.php">Deconnexion</a>
        <?php  } ?>
    </nav>
</header>