<?php
require_once("../config/mysql.php");

$today = date("Y-m-d H:i:s");

function checkAddParams($user_id, $title, $content, $categorie, $today)
{

    global $error;
    $user_id =  htmlspecialchars(strip_tags($user_id));
    $title =  htmlspecialchars(strip_tags($title));
    $content =  htmlspecialchars(strip_tags($content));
    $categorie =  htmlspecialchars(strip_tags($categorie));

    if (empty($user_id) || empty($title) ||  empty($content) || empty($categorie)) {
        $error["message"] .= "Veuillez remplir tous les champs. Merci ! </br>";
        $error["exist"] = true;

        return $error;
    }

    insertArticle($user_id, $title, $content, $categorie, $today);
}

function insertArticle($user_id, $title, $content, $categorie, $today)


{
    global $connexion;
    global $domaine;
    $query = $connexion->prepare("INSERT INTO `articles` (`title`, `content`, `user_id`, `article_date`) VALUES (:title, :content, :user_id `article_date`)");
    $reponse = $query->execute(['title' => $title, 'content' => $content, 'user_id' => $user_id, `article_date` => $today]);

    if ($reponse) {
        header("location: " . $domaine . "/views/PageAjoutArticles.php");
        return;
    } else {
        header("Location:" . $domaine . "/views/PageAjoutArticles.php?error=une erreur est survenu lors de l'ajout de l'article");
        return;
    }
}
