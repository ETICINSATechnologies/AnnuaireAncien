<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <link rel="stylesheet" href="../style/ordinateur/profil.css">
</head>

<body onload="init()">
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>
<?php include '../../services/updatePicture.php'; ?>

<section id="form_area">

    <form id="profil_form">
        <div id="image"> </div>

        <p id="p_lastname" class="right p_info"> Nom </p>

        <input type="text" id="lastname" class="right" value="" title="lastname">

        <p id="p_firstname" class="right p_info"> Prénom </p>

        <input type="text" id="firstname" class="right" value="" title="firstname">

        <p id="p_phone" class="p_info"> Téléphone </p>

        <p id="p_department" class="p_info"> Département </p>

        <input type="text" id="phone" value="" title="phone">

        <input type="text" id="department" value="" title="department">

        <p id="p_email" class="p_info"> Adresse mail </p>

        <p id="p_etic_position" class="p_info"> Poste che Etic </p>

        <input type="text" id="email" value="" title="email">

        <input type="text" id="etic_position" value="" title="etic_position">

        <p id="p_company" class="p_info"> Travaille chez </p>

        <p id="p_mandate_year" class="p_info"> Année à Etic </p>

        <input type="text" id="company" value="" title="company">

        <input type="text" id="mandate_year" value="" title="mandate_year">

        <div id="info_area"> </div>

        <div id="button" class="right">
            <input id="connect_input" type="button" value="Sauvegarder" onclick="update()">
        </div>
    </form>

    <div id="fenetre">
        <form id="image_form" method="post" action="../../services/updatePicture.php" enctype="multipart/form-data">
            <div id="image2"> </div>
            <input type="file" name="icone" id="icone" /><br/>
            <input id="precedent" type="button" value="précedent">
            <input id="savefile" type="submit" name="submit" value="suivant"/>
        </form>
    </div>
</section>
<script>
    document.getElementById('image').addEventListener('click', function() {
        document.getElementById('fenetre').style.display = 'block';
    });
    document.getElementById('precedent').addEventListener('click', function() {
        document.getElementById('fenetre').style.display = 'none';
    });
</script>



<?php include 'footer.php'; ?>
<?php include '../script/config.php'; ?>
<script src="../script/update.js"></script>
<script src="../script/init.js"></script>
</body>
</html>