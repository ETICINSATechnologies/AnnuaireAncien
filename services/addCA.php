<?php
include 'connectDB.php';
session_start();

$method = $_GET;

if ($_SESSION['admin'])
{
    $sql = 'INSERT INTO  ann_ca (id) VALUES (:id)';
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $method['id']);
    $data = $stmt->execute();
    if (!$stmt)
    {
        die ('error because ' . print_r($bdd->errorInfo(), true));
    }
    else
    {
        echo json_encode($data);
    }
}
else
{
    echo json_encode(false);
}

