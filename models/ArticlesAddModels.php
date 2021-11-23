<?php
require_once("../config/mysql.php");

function checkAddParams($user_id, $title, $content, $categorie)
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

    insertArticle($user_id, $title, $content, $categorie);
}

function insertArticle($user_id, $title, $content, $categorie)


{
    global $connexion;
    global $domaine;
    $query = $connexion->prepare("INSERT INTO `articles` (`title`, `content`, `user_id`) VALUES (:title, :content, :user_id)");
    $reponse = $query->execute(['title' => $title, 'content' => $content, 'user_id' => $user_id]);

    if ($reponse) {
        header("location: " . $domaine . "/views/PageAjoutArticles.php");
        return;
    } else {
        header("Location:" . $domaine . "/views/PageAjoutArticles.php?error=une erreur est survenu lors de l'ajout de l'article");
        return;
    }
}
