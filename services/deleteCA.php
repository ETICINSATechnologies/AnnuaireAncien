<?php
include 'connectDB.php';
session_start();

$method = $_GET;

if ($_SESSION['admin'])
{
    $sql = 'DELETE FROM ann_ca WHERE id=:id';
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

