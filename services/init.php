<?php
include 'connectDB.php';
include 'JwtCodec.php';

$headers = apache_request_headers();
if ($headers['Authorization'])
{
    $signature = JwtCodec::decode($headers['Authorization']);
    if ($signature['admin'])
        echo true;
    else
    {
        $id = $signature['id'];

        $sql = 'SELECT m.id, m.firstname, m.lastname, m.phone, m.email, m.company, m.department, m.photo, p3.*
        FROM ann_membres m INNER JOIN (
            (SELECT p.membre, p.etic_position, p.mandate_year
             FROM ann_position p
               INNER JOIN (SELECT p.membre, max(mandate_year) AS mandate_year
                   FROM ann_position p
                   GROUP BY p.membre) p2 ON p.mandate_year = p2.mandate_year AND p.membre = p2.membre)) p3
        ON m.id = p3.membre AND m.id = :id';

        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        if (!$stmt)
        {
            die ('error because ' . print_r($bdd->errorInfo(), true));
        }
        else
        {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($data);
        }
    }
}

