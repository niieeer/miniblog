<?php
require_once("../config/mysql.php");
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $suppr_id = htmlspecialchars($_GET['id']);
    $suppr = $connexion->prepare('UPDATE articles SET is_DELETED = 1 WHERE id = ? ');
    $suppr->execute(array($suppr_id));
    header('Location: http://localhost/miniBlog/views/pageAdmin.php');
}
