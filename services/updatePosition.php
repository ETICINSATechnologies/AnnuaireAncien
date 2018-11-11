<?php
include 'connectDB.php';
include 'sendEmail.php';
include 'JwtCodec.php';

$validAttributes = array('firstname', 'lastname', 'phone', 'email', 'password', 'company', 'etic_position', 'mandate_year', 'department');

$method = $_POST;
$parametersNb = sizeof($method);
$attributes = array_keys($method);
$values = array_values($method);

$postInput = json_decode(file_get_contents('php://input'), true);

$headers = apache_request_headers();

if (isset($headers['Authorization']))
{
    $signature = JwtCodec::decode($headers['Authorization']);
    if ($signature['admin'] == 0)
    {
        $id = $signature['id'];
        $sql = 'DELETE FROM ann_position WHERE membre = :idMembre';
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':idMembre', $id);
        $stmt->execute();
        $data = $stmt->execute();
        if (!$stmt)
        {
            die ('error because ' . print_r($bdd->errorInfo(), true));
        }
        else
        {
            echo json_encode($data);
        }
    }

    if ($signature['admin'] == 1)
        $id = $postInput['membre'];

    foreach ($postInput['positions'] as $position)
    {
        $sql = 'INSERT INTO ann_position(etic_position, membre, mandate_year) VALUES (:position, :membre, :year)';
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':membre', $id);
        $stmt->bindParam(':position', $position["position"]);
        $stmt->bindParam(':year', $position["year"]);
        $data = $stmt->execute();
        if (!$stmt)
        {
            die ('error because ' . print_r($bdd->errorInfo(), true));
        }
        else
        {
            echo json_encode($data);
        }
    }
}

/*
echo $_POST;
foreach ($_POST as $position)
{
    echo $position;
}

foreach ($_POST as $key => $value)
{
    echo $key . " => " . $value;
}
*/
/*
if (validateRequest($validAttributes, $attributes) && isset($_SESSION['id']))
{
    if ($_SESSION['admin'])
    {
        if (validateCreation($method))
        {
            $sql = 'INSERT INTO  ann_membres (';
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
            echo json_encode($success);
        }
        else
            echo false;
    }
    else
    {
        $sql = "UPDATE ann_membres";

        for ($i = 0; $i < $parametersNb; $i++)
        {
            if ($attributes[$i] == "password")
            {
                echo hash('sha512', $values[$i]);
                $values[$i] = hash('sha512', $values[$i]);
            }
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

        echo bindExecute($bdd, $sql, $values);
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


function validateCreation($_method)
{
    return ($_method['firstname'] != '' and $_method['lastname'] != '' and $_method['email'] != '');
}

function randomPassword($length)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);
}

*/