<?php
include 'connectDB.php';

$method = $_GET;
$validAttributes = array('email', 'password');
$parametersNb = sizeof($method);
$attributes = array_keys($method);


if (validateRequest($validAttributes, $attributes))
{
    $sql = 'SELECT * FROM ann_admin WHERE email=:email AND password=:password';

    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':email',$method['email']);
    $stmt->bindParam(':password',$method['password']);

    $stmt->execute();

    if (!$stmt)
    {
        die ('error because ' . print_r($bdd->errorInfo(), true));
    }
    else
    {
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
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
