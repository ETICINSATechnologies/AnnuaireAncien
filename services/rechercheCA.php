<?php
include 'connectDB.php';

$sql = 'SELECT m.id, m.firstname, m.lastname, m.etic_position, m.photo FROM membres m, ca WHERE m.id = ca.id';

$response = $bdd->query($sql);
if (!$response)
{
    die ('error because ' . print_r($bdd->errorInfo(), true));
}
else
{
    $data = $response->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
}

