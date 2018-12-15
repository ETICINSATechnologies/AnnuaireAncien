<?php
include 'connectDB.php';
$index = 'icone';

$headers = apache_request_headers();

if (isset($headers['Authorization']))
{
    $signature = JwtCodec::decode($headers['Authorization']);
    if ($signature['id'] and isset($_FILES[$index]))
    {
        $maxsize = 1536054545456450;
        $extensions = array('png', 'gif', 'jpg', 'jpeg');

        //Test1: fichier correctement uploadé
        if ($_FILES[$index]['error'] > 0)
        {
            echo FALSE;
        }

        //Test2: taille limite
        if ($_FILES[$index]['size'] > $maxsize)
        {
            echo FALSE;
        }
        //Test3: extension
        $ext = strtolower(substr(strrchr($_FILES[$index]['name'], '.'), 1));
        if ($extensions !== FALSE AND !in_array($ext, $extensions))
        {
            echo FALSE;
        }
        //Déplacement
        $nom = $signature['id'] . '.' . $ext;
        $destination = '../public/image/' . $signature['id'] . '.' . $ext;
        $upload = move_uploaded_file($_FILES[$index]['tmp_name'], $destination);

        //Modification dans la base de donnees
        if ($signature['ADMIN'])
        {
            return $destination;
        }
        else
        {
            if ($upload)
            {
                $sql = 'UPDATE ann_membres SET photo=:value1 WHERE id=:value2';

                $stmt = $bdd->prepare($sql);

                $stmt->bindParam(':value1', $nom);
                $stmt->bindParam(':value2', $signature['id']);

                $stmt->execute();

                if (!$stmt)
                {
                    die ('error because ' . print_r($bdd->errorInfo(), true));
                }
                else
                {
                    echo json_encode(true);
                    header('Location: http://localhost/AnnuaireAncien/front/src/profil.php');
                    echo $data;
                    exit();
                }
            }
            else
            {
                header('Location: http://localhost/AnnuaireAncien/front/src/profil.php');
                echo 'dsjksjk';
                exit();
            }
        }
    }
}


