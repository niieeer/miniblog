<?php
require_once("../config/mysql.php");
isset($_POST['title'], $_POST['content'], $_POST['id']);


$title = htmlspecialchars($_POST['title']);
$content = htmlspecialchars($_POST['content']);
$edit_id = htmlspecialchars($_POST['id']);



$req = $connexion->prepare('UPDATE articles SET title = ?, content = ? WHERE id = ?');
$req->execute(array($title, $content, $edit_id));
header('Location: http://localhost/miniBlog/views/pageArticle.php?id=' . $edit_id);










    // header('Location: http://localhost/miniBlog/views/pageAdmin.php?=qdQZOKDqolmhdqdjhqlkdzhql')
