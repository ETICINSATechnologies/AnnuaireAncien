<?php
include 'connectDB.php';
session_start();
$index = 'icone';
if (isset($_SESSION['id']) and isset($_FILES[$index])) {

    $maxsize = 1536054545456450;
    $extensions = array('png', 'gif', 'jpg', 'jpeg');

    //Test1: fichier correctement uploadé
    if ($_FILES[$index]['error'] > 0) {

        echo FALSE;

    }

    //Test2: taille limite
    if ($_FILES[$index]['size'] > $maxsize) {

        echo FALSE;
    }
    //Test3: extension
    $ext = strtolower(substr(strrchr($_FILES[$index]['name'], '.'), 1));
    if ($extensions !== FALSE AND !in_array($ext, $extensions)) {

        echo FALSE;
    }
    //Déplacement
    $nom = $_SESSION['id'] . '.' . $ext;
    $destination = '../public/image/' . $_SESSION['id'] . '.' . $ext;
    $upload = move_uploaded_file($_FILES[$index]['tmp_name'], $destination);

    //Modification dans la base de donnees
    if ($upload) {
        $sql = 'UPDATE membres SET photo=:value1 WHERE id=:value2';

        $stmt = $bdd->prepare($sql);

        $stmt->bindParam(':value1', $nom);
        $stmt->bindParam(':value2', $_SESSION['id']);

        $stmt->execute();


        if (!$stmt) {
            die ('error because ' . print_r($bdd->errorInfo(), true));
        } else {
            echo json_encode(true);
            header('Location: http://localhost/AnnuaireAncien/front/src/profil.php');
            exit();
            //echo $data;
        }
    } else {
        echo FALSE;
    }


}



?>
