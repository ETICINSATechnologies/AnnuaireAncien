<?php
include 'connectDB.php';

session_start();

$validAttributes = array('email', 'password');

$method = $_GET;

$parametersNb = sizeof($method);
$attributes = array_keys($method);

if (validateRequest($validAttributes, $attributes))
{
    $method['password'] = hash('sha512', $method['password']);
    $values = array_values($method);

    $admin = checkExist($bdd, $parametersNb, $values, $attributes, 'ann_admin');

    if ($admin)
    {
        $_SESSION['id'] = $admin['id'];
        $_SESSION['admin'] = true;
        echo "admin";
    }
    else
    {
        $membre = checkExist($bdd, $parametersNb, $values, $attributes, 'ann_membres');

        if ($membre)
        {
            $_SESSION['id'] = $membre['id'];
            $_SESSION['admin'] = false;
            echo "membre";
        }
        else
        {
            $_SESSION['id'] = "";
            $_SESSION['admin'] = "";
            echo false;
        }
    }
}

function checkExist(PDO $bdd, int $parametersNb, array $values, array $attributes, string $table)
{
    $sql = 'SELECT id FROM ' . $table;

    for ($i = 0; $i < $parametersNb; $i++)
    {
        if ($i == 0)
        {
            $sql .= ' WHERE ';
        }
        else
        {
            $sql .= ' AND ';
        }
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
