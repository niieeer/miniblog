<?php
if (isset($_POST['user'], $_POST['mail'], $_POST['pass'], $_POST['confpass'])) {

    //model connexion à la base de donnée
    require_once("../config/mysql.php");


    //recuperation des données
    $pseudo = htmlspecialchars($_POST['user']);
    $email = htmlspecialchars($_POST['mail']);
    $pass = htmlspecialchars($_POST['pass']);
    $confpass = htmlspecialchars($_POST['confpass']);

    //verification de la validité des information
    $reponse = $connexion->query("SELECT pseudo FROM membres WHERE pseudo='$pseudo'");
    $donnees = $reponse->fetch();

    //pseudo existant
    if ($donnees >= 1) {

        $reponse->closeCursor();

        $message = "Le pseudo est déjà utilisé";
        header('Location: ../views/pageInscription.php?message=' . $message);
    }
    //correspondance des mdp
    elseif ($pass != $confpass) {

        $message = "Les mot de passe doivent correspondre";
        header('Location: ../views/pageInscription.php?message=' . $message);
    }
    //verification de l'adresse mail avec une expression régulière
    elseif (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {



        //preparation de la requete et insertion en base de donnée
        $req = $connexion->prepare('INSERT INTO membres (pseudo, pass, email, date_inscription) VALUES(?, ?, ?, ?)');

        //mdp hash
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        $req->execute(array($pseudo, $pass_hash, $email, date("Y-m-d")));

        header('Location: ../index.php');
    } else {

        //si l'adresse mail n'est pas valide
        $message = "L'adresse mail n'est pas valide";
        header('Location: ../views/pageInscription.php?message=' . $message);
    }
}
