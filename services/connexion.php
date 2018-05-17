<?php
include 'connectDB.php';

$validAttributes = array('email', 'password');

$method = $_GET;

$parametersNb = sizeof($method);
$attributes = array_keys($method);

if (validateRequest($validAttributes, $attributes))
{
    $method['password'] = hash('sha512', $method['password']);
    $values = array_values($method);

    $admin = checkExist($bdd, $parametersNb, $values, $attributes, 'admin');

    if ($admin)
    {
        $_SESSION['id'] = $admin['id'];
        $_SESSION['admin'] = "true";
        echo "admin";
    }
    else
    {
        $membre = checkExist($bdd, $parametersNb, $values, $attributes, 'membres');

        if ($membre)
        {
            $_SESSION['id'] = $membre['id'];
            $_SESSION['admin'] = "false";
            echo "membre";
        }
        else
        {
            echo "false";
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

/*$sql_1 = 'SELECT id FROM membres ';

    for ($i = 0; $i < $parametersNb; $i++)
    {
        if ($i == 0)
        {
            $sql_1 .= ' WHERE ';
        }
        else
        {
            $sql_1 .= ' AND ';
        }
        $sql_1 .= $attributes[$i] . ' = ' . ':value' . $i;
    }

    $stmt = $bdd->prepare($sql_1);

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
        if (isset($data['id']))
        {
            session_start();
            $_SESSION['id'] = $data['id'];
            $_SESSION['admin'] = "false";
            $sql_2 = 'SELECT id FROM admin ';
            $sql_2 .= ' WHERE ';
            $sql_2 .= 'id' . ' = ' . $_SESSION['id'];
            $stmt = $bdd->prepare($sql_2);

            $stmt->execute();
            if (!$stmt)
            {
                die ('error because ' . print_r($bdd->errorInfo(), true));
            }
            else
            {
                $admin = $stmt->fetch();

                if ($admin['id'] == $_SESSION['id'])
                {
                    $_SESSION['admin'] = "true";
                    $response = 'admin';
                }
                else
                {
                    $response = 'membre';
                }
            }
            echo $response;
        }

    }*/
