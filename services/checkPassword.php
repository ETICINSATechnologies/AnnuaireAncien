<?php
include 'connectDB.php';
include 'JwtCodec.php';

$method = $_POST;

$headers = apache_request_headers();

if (isset($headers['Authorization']))
{
    $signature = JwtCodec::decode($headers['Authorization']);
    if ($signature['id'])
    {
        $id = $signature['id'];
        $password = hash('sha512', $method["password"]);

        $sql = 'SELECT id FROM ann_membres WHERE id = :id AND password = :password';

        $stmt = $bdd->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        if (!$stmt)
            die ('error because ' . print_r($bdd->errorInfo(), true));
        else
        {
            $data = $stmt->fetch();
            echo json_encode(!empty($data));
        }
    }
}

