<?php
require_once("../config/config.php");
require_once("../models/ArticlesAddModels.php");

if (isset($_GET['type'])) {
    $type = $_GET['type'];


    if ($_GET['type'] === "add") {
        if (!isset(
            $_POST['user_id'],
            $_POST['title'],
            $_POST['content'],
            $_POST['categorie'],
            $today
        )) {
            header("Location:" . $domaine . "/views/pageAjoutArticles.php.php?error=un parametre manque à la requete");
            return;
        }

        $isValid = checkAddParams($_POST['user_id'], $_POST['title'],  $_POST['content'], $_POST['categorie'], $today);
    }
}
