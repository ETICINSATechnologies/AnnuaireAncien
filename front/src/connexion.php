<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <link rel="stylesheet" href="../style/ordinateur/connexion.css">
</head>

<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<section id="area">
    <form id="connect_form">
        <div id="info_area"> </div>
        <p> Identifiant </p>
        <input type="text" id="email">
        <p> Mot de passe </p>
        <input type="password" id="password">
        <a href="recup.php"> Mot de passe oublié ?</a>
        <input id="connect_input" type="button" value="Se connecter" onclick="connect()">
    </form>
</section>

<?php include 'footer.php'; ?>
<?php include '../script/config.php'; ?>
<script src="../script/connexion.js"></script>
</body>
</html>