<?php
include 'connectDB.php';

$validAttributes = array('email', 'password');

$method = $_GET;


$parametersNb = sizeof($method);
$attributes = array_keys($method);
$values = array_values($method);
$values[1] = hash('sha512', $values[1]);
if (validateRequest($validAttributes, $attributes))
{
    $sql = 'SELECT id FROM membres ';

    for ($i = 0; $i < $parametersNb; $i++)
    {
        if ($i == 0)
            $sql .= ' WHERE ';
        else
            $sql .= ' AND ';
        $sql .= $attributes[$i] . ' = ' . ':value' . $i;
    }

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
        $data = $stmt->fetch();
        if(isset($data['id'])){
            session_start ();
            $_SESSION['id'] =$data['id'];
        }
        echo $data['id'];
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
