<?php
include 'connectDB.php';
session_start();

$validAttributes = array('firstname', 'lastname', 'phone', 'email', 'password', 'company', 'etic_position', 'mandate_year', 'department');

$method = $_GET;

$parametersNb = sizeof($method);
$attributes = array_keys($method);
$values = array_values($method);

if (validateRequest($validAttributes, $attributes) && isset($_SESSION['id']))
{
    if($_SESSION['admin']=="true"){
        echo "ici";
        $sql = 'INSERT INTO membres';
        $sql .='(';
        for ($i = 0; $i < $parametersNb; $i++)
        {
            if($i==$parametersNb-1){
                $sql .=$attributes[$i] .')';
            }
            else{
                $sql .=$attributes[$i] .',';
            }
        }
        $sql .='VALUES(';
        for ($i = 0; $i < $parametersNb; $i++)
        {
            if($i==$parametersNb-1){
                $sql .='?' .')';
            }
            else{
                $sql .='?' .',';
            }

        }

        echo $sql;
        $stmt = $bdd->prepare($sql);
        for ($i = 1; $i <= $parametersNb; $i++)
        {
            $stmt->bindParam( $i, $values[$i-1]);
        }
        $data = $stmt->execute();
        echo $data;


    }
    else{

        $sql = 'UPDATE membres';

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

        echo $sql;

        $stmt = $bdd->prepare($sql);

        for ($i = 0; $i < $parametersNb; $i++)
        {
            $stmt->bindParam(':value' . $i, $values[$i]);
        }
        $data = $stmt->execute();
        echo $data;

        if (!$stmt)
        {
            die ('error because ' . print_r($bdd->errorInfo(), true));
        }
        else
        {
            echo $data;
        }
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
