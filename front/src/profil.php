<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'?>
    <link rel="stylesheet" href="../style/ordinateur/profil.css">
    <script src="../script/update.js"></script>
    <script src="../script/init.js"></script>
</head>

<body onload="init()">
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>


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


<?php include 'footer.php'; ?>
<?php include '../script/config.php'; ?>
</body>
</html>