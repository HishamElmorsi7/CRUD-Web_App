<?php
    require_once '../../includes/dbh.php';

    $id = $_POST['id'] ?? null;

    if (!$id){
        header('location: index.php');
        exit();
    }

    
    $statement = $pdo->prepare("DELETE FROM products WHERE id = $id  ");
    $statement->bindValue(':id', $id);
    $statement->execute();
    
    header("location: index.php");


