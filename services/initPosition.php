<?php
include 'connectDB.php';
session_start();

if ($_SESSION['admin'])
    echo true;
elseif(isset($_SESSION['id']))
{
    $id = $_SESSION['id'];
    $sql = 'SELECT * FROM ann_position WHERE membre = :membre_id';

    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':membre_id', $id);
    $stmt->execute();

    if (!$stmt)
    {
        die ('error because ' . print_r($bdd->errorInfo(), true));
    }
    else
    {
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }
}

