<?php
include 'connectDB.php';
include 'JwtCodec.php';
session_start();

$headers = apache_request_headers();
if ($headers['Authorization'])
{
    $signature = JwtCodec::decode($headers['Authorization']);
    if ($signature['admin'])
        echo true;
    else
    {
        $id = $signature['id'];
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
}

