<?php
include 'connectDB.php';

$sql = 'SELECT ca.*
        FROM ann_ca INNER JOIN (
          SELECT m.*, p3.etic_position, p3.mandate_year
              FROM ann_membres m INNER JOIN (
                  (SELECT p.membre, p.etic_position, p.mandate_year
                   FROM ann_position p INNER JOIN (
                      SELECT p.membre, max(mandate_year) AS mandate_year
                      FROM ann_position p
                      GROUP BY p.membre) p2
                   ON p.mandate_year = p2.mandate_year AND p.membre = p2.membre)) p3
              ON m.id = p3.membre) ca
          On ca.id = ann_ca.id';

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

