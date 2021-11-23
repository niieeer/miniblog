<?php

if (isset($_POST['pseudo'], $_POST['pass'])) {

    //model connexion à la base de donnée
    require_once("../config/mysql.php");

    $pseudo = htmlspecialchars($_POST['pseudo']);


    //  Récupération de l'utilisateur et de son pass hashé
    $req = $connexion->prepare('SELECT id, pass FROM membres WHERE pseudo = :pseudo');
    $req->execute(array(
        'pseudo' => $pseudo
    ));
    $resultat = $req->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

    if (!$resultat) {
        $message = "Mauvais identifiant ou mot de passe !";
        header('Location: ../views/pageConnexion.php?message=' . $message);
    } else {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['user_id'] = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;

            header('Location: ../index.php');
        } else {

            $message = "Mauvais identifiant ou mot de passe !";
            header('Location: ../views/pageConnexion.php?message=' . $message);
        }
    }
}
