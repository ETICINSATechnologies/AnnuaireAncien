<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'?>
    <link rel="stylesheet" href="../style/ordinateur/connexion.css">
    <script src="../script/connexion.js"></script>
</head>

<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<section id="area">
    <form id="connect_form">

        <div id="info_area">

        </div>

            <p> <b>Identifiant </b> </p>
            <input type="text" id="email">
            <p> <b>Mot de passe </b> </p>
            <input type="password" id="password">
            <br> <br>
            <a href="recup.php"> Mot de passe oublié ?</a>
            <br> <br>
            <input id="connect_input" type="button" value="Se connecter" onclick="connect()">
    </form>
</section>

<?php include 'footer.php'; ?>
<?php include '../script/config.php'; ?>
</body>
</html>