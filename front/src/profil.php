<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'?>
    <link rel="stylesheet" href="../style/ordinateur/profil.css">
    <script src="../script/update.js"></script>
    <script src="../script/init.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<body onload="init()">
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include '../../services/updatePicture.php'; ?>
<form method="post" action="../../services/updatePicture.php" enctype="multipart/form-data">
    <label for="icone">Icône du fichier (JPG, PNG ou GIF | max. 15 Ko) :</label><br />
    <input type="file" name="icone" id="icone" /><br />

    <input id="savefile" type="submit" name="submit" value="Envoyer" />
</form>


    <form id="profil_form">
        <div id="response_area">

        </div>
        <div id="image">

        </div>

        <p> <b>Nom </b> </p>
        <input type="text" id="lastname" value="">
        <p> <b>Prénom </b> </p>
        <input type="text" id="firstname">
        <p> <b>téléphone </b> </p>
        <input type="text" id="phone">
        <p> <b>Département </b> </p>
        <input type="text" id="department">
        <p> <b>Adresse mail </b> </p>
        <input type="text" id="email">
        <p> <b>Poste chez Etic </b> </p>
        <input type="text" id="etic_position">
        <p> <b>Travaille chez </b> </p>
        <input type="text" id="company">
        <p> <b>Année à Etic </b> </p>
        <input type="text" id="mandate_year">

        <input id="connect_input" type="button" value="Sauvegarder" onclick="update()" >


    </form>
<!--
<script>
    function save() {
        $.ajax({
            url : '../../services/updatePicture.php', // La ressource ciblée
            type : 'GET', // Le type de la requête HTTP

            dataType : 'json', // Le type de données à recevoir, ici, du HTML.
            success : function(data){ // code_html contient le HTML renvoyé

                var titi=JSON.parse(data);
                console.log("TOUT MARHCE");
                console.log(titi);

            }
        });

    }
    $(document).ready(function () {
        // ajout d'un "handler" sur le clic du bouton de connexion

        $('#save_file').on('click', function () {
            // affichage pour debugage dans la console javascript du navigateur
            console.log('Click sur le bouton "Se Connecter"');
            // appel de la fonction connexion
            save();
        });
    });


</script>-->


<?php include 'footer.php'; ?>
<?php include '../script/config.php'; ?>
</body>
</html>