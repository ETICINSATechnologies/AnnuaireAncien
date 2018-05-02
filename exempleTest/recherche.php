<?php
include 'connectDB.php';

$validAttributes = array('firstname', 'lastname', 'company', 'mandate_year');

$method = $_POST;
$parametersNb = sizeof($method);
$attributes = array_keys($method);
$values = array_values($method);

if (validateRequest($validAttributes, $attributes))
{
    $sql = 'SELECT * FROM membres';

    for ($i = 0; $i < $parametersNb; $i++)
    {
        if ($i == 0)
            $sql .= ' WHERE ';
        else
            $sql .= ' AND ';
        $sql .= $attributes[$i] . ' = ' . ':value' . $i;
    }
    $sql .= " ORDER BY lastname, firstname";

    $stmt = $bdd->prepare($sql);

    for ($i = 0; $i < $parametersNb; $i++)
    {
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
            return false;
    }
    return true;
}
