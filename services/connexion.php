<?php
include 'connectDB.php';
include 'JwtCodec.php';

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
        echo JwtCodec::encode(
            [
                'admin' => 1,
                'id' => $admin['id']
            ]);
    }
    else
    {
        $membre = checkExist($bdd, $parametersNb, $values, $attributes, 'ann_membres');

        if ($membre)
        {
            echo JwtCodec::encode(
                [
                    'admin' => 0,
                    'id' => $membre['id']
                ]);
        }
        else
        {
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
