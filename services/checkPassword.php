<?php
include 'connectDB.php';
session_start();

$method = $_GET;

if(isset($_SESSION['id']))
{
    $id = $_SESSION['id'];
    $password = hash('sha512', $method["password"]);

    $sql = 'SELECT id FROM ann_membres WHERE id = :id AND password = :password';

    $stmt = $bdd->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':password', $password);

    $stmt->execute();


    if (!$stmt)
    {
        die ('error because ' . print_r($bdd->errorInfo(), true));
    }
    else
    {
        $data = $stmt->fetch();
        echo json_encode($data);
    }
}

