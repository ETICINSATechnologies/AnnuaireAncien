<?php
include 'connectDB.php';
session_start();

if ($_SESSION['admin'])
    echo true;
elseif(isset($_SESSION['id']))
{
    $parametersNb = 1;
    $attributes = array('id');
    $values = array($_SESSION['id']);
    $sql = 'SELECT * FROM ann_membres ';

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
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($data);
    }
}

