<?php
include 'connectDB.php';
include 'sendEmail.php';
session_start();

$validAttributes = array('firstname', 'lastname', 'phone', 'email', 'password', 'company', 'etic_position', 'mandate_year', 'department');

$method = $_GET;
$parametersNb = sizeof($method);
$attributes = array_keys($method);
$values = array_values($method);

if (validateRequest($validAttributes, $attributes) && isset($_SESSION['id']))
{
    if ($_SESSION['admin'])
    {
        $sql = 'INSERT INTO  membres (';
        $member_values = " VALUES (";

        if (!in_array("password", $attributes))
        {
            $attributes[] = "password";
            $password = randomPassword(16);
            $values[] = hash('sha512', $password);
            $parametersNb++;
        }

        for ($i = 0; $i < $parametersNb; $i++)
        {
            if ($i == $parametersNb - 1)
            {
                $sql .= $attributes[$i];
                $sql .= ')';
                $member_values .= ':value' . $i;
                $member_values .= ")";
            }
            else
            {
                $sql .= $attributes[$i];
                $sql .= ', ';
                $member_values .= ':value' . $i;
                $member_values .= ", ";
            }
        }

        $sql .= $member_values;

        $success = bindExecute($bdd, $sql, $values);
        if ($success)
            sendEmail($method["email"], $password);
        echo $success;
    }
    else
    {
        $sql = "UPDATE membres";
        if ($method["password"])
            echo $method["password"];

        for ($i = 0; $i < $parametersNb; $i++)
        {
            if ($i == 0)
            {
                $sql .= ' SET ';
                $sql .= $attributes[$i] . ' = ' . ':value' . $i;
            }
            else
            {
                $sql .= ',';
                $sql .= $attributes[$i] . ' = ' . ':value' . $i;
            }
        }

        $sql .= ' WHERE ';
        $sql .= 'id' . ' = ' . $_SESSION['id'];

        bindExecute($bdd, $sql, $values);
    }
}

function bindExecute(PDO $bdd, String $sql, array $values)
{
    $stmt = $bdd->prepare($sql);

    for ($i = 0; $i < sizeof($values); $i++)
    {
        $stmt->bindParam(':value' . $i, $values[$i]);
    }
    $data = $stmt->execute();

    if (!$stmt)
    {
        die ('error because ' . print_r($bdd->errorInfo(), true));
    }
    else
    {
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


function randomPassword($length)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);
}