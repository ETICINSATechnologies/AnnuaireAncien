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
    $sql_1 = 'SELECT id FROM membres ';

    for ($i = 0; $i < $parametersNb; $i++)
    {
        if ($i == 0)
            $sql_1 .= ' WHERE ';
        else
            $sql_1 .= ' AND ';
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
        if(isset($data['id'])){


            session_start ();
            $_SESSION['id'] =$data['id'];
            $_SESSION['admin']=="false";
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

                if($admin['id']==$_SESSION['id']){
                    $_SESSION['admin'] ="true";
                    $response= 'admin';
                }
                else{
                    $response='membre';
                }

            }

            echo  $response ;


        }

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
