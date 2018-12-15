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
    <?php include 'profil_form.php'; ?>
    <?php include 'position_form.php'; ?>
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

<?php include 'footer.php'; ?>
<?php include '../script/config.php'; ?>

<script src="../script/update.js"></script>
<script src="../script/init.js"></script>
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
    document.getElementById('update_input').addEventListener('click', update);
    document.getElementById('deconnexion').addEventListener('click', function()
    {
        document.cookie = "jwt=";

    });
</script>
</body>
</html>