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
        <div id="image"></div>

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

        <div id="password_button" class="div_button">
            <input id="password_input" class="input_button" type="button" value="Changer mot de passe">
        </div>

        <div id="update_button" class="div_button">
            <input id="update_input" class="input_button" type="button" value="Sauvegarder" onclick="update()">
        </div>

        <div id="info_area"></div>
    </form>
</section>

<section id="password_window" class="window">
    <form id="password_form">
        <div id="password_info"></div>
        <p> Ancien mot de passe </p>
        <input type="password" id="old_password">
        <p> Nouveau mot de passe </p>
        <input type="password" id="new_password">
        <p> Nouveau mot de passe </p>
        <input type="password" id="confirmed_new_password">
        <a href="recup.php"> Mot de passe oublié ?</a>
        <div id="input_div">
            <input id="cancel_password" class="cancel_input" type="button" value="annuler">
            <input id="savefile" class="validate_input" type="button" name="submit" value="valider" onclick="updatePassword()"/>
        </div>
    </form>
</section>

<section id="image_window" class="window">
    <form id="image_form" method="post" action="../../services/updatePicture.php" enctype="multipart/form-data">
        <div id="image2"></div>
        <input type="file" name="icone" id="icone"/>
        <div id="input_image_div">
            <input id="cancel_image" class="cancel_input" type="button" value="annuler">
            <input id="savefile" class="validate_input" type="submit" name="submit" value="valider"/>
        </div>
    </form>
</section>

<script>
    document.getElementById('image').addEventListener('click', function ()
    {
        document.getElementById('image_window').style.display = 'block';
        document.getElementById('form_area').style.setProperty("opacity", "0.2");
    });
    document.getElementById('cancel_image').addEventListener('click', function ()
    {
        document.getElementById('image_window').style.display = 'none';
        document.getElementById('form_area').style.setProperty("opacity", "");
    });
    document.getElementById('password_input').addEventListener('click', function ()
    {
        document.getElementById('password_window').style.display = 'grid';
        document.getElementById('form_area').style.setProperty("opacity", "0.2");
    });
    document.getElementById('cancel_password').addEventListener('click', function ()
    {
        document.getElementById('password_window').style.display = 'none';
        document.getElementById('form_area').style.setProperty("opacity", "");
    });
</script>


<?php include 'footer.php'; ?>
<?php include '../script/config.php'; ?>
<script src="../script/update.js"></script>
<script src="../script/init.js"></script>
</body>
</html>