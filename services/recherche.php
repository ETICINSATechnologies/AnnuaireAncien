<?php
include 'connectDB.php';

$validAttributes = array('firstname', 'lastname', 'company', 'mandate_year', 'id');

$method = $_POST;
$parametersNb = sizeof($method);
$attributes = array_keys($method);
$values = array_values($method);

if (validateRequest($validAttributes, $attributes))
{
    $sql = 'SELECT m.id, m.firstname, m.lastname, m.phone, m.email, m.company, m.department, m.photo, p3.*
        FROM ann_membres m INNER JOIN (
            (SELECT p.membre, p.etic_position, p.mandate_year
             FROM ann_position p
               INNER JOIN (SELECT p.membre, max(mandate_year) AS mandate_year
                   FROM ann_position p
                   GROUP BY p.membre) p2 ON p.mandate_year = p2.mandate_year AND p.membre = p2.membre)) p3
      ON m.id = p3.membre';

    for ($i = 0; $i < $parametersNb; $i++)
    {
        $sql .= ' AND ';
        $sql .= $attributes[$i] . ' = ' . ':value' . $i;
    }
    $sql .= " ORDER BY lastname, firstname";

    $stmt = $bdd->prepare($sql);

    for ($i = 0; $i < $parametersNb; $i++)
    {
        $values[$i] = strtolower($values[$i]);
        $stmt->bindParam(':value' . $i, $values[$i]);
    }

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

function validateRequest($validAttributes, $attributes)
{
    foreach ($attributes as $attribute)
    {
        if (!in_array($attribute, $validAttributes))
        {
            return false;
        }
    }
    return true;
}
