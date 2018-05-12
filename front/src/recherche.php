<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'?>
    <link rel="stylesheet" href="../style/ordinateur/recherche.css">
</head>

<body>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<section id="search_section">
    <div id="search_area">
    <form id="search_form">
        <p> Nom </p>
        <input type="text" id="lastname">
        <p> Prénom </p>
        <input type="text" id="firstname">
        <p> Entreprise
        </p> <input type="text" id="company">
        <p> Année </p>
        <input type="text" id="mandate_year">
        <input id="search_input" type="button" value="Rechercher" onclick="search()">
    </form>
    </div>

    <div id="response_area">

    </div>

    <div id="info_area">
        <p id="p_info">
            Vous pouvez effectuer une recherche sur l'ensemble des membres, en fonction des différents critères ci-contre. <br>
            Aucun n'est obligatoire mais la recherche doit s'effectuer sur au moins un de ces critères
        </p>
    </div>

</section>

<?php include 'footer.php'; ?>
<?php include '../script/config.php'; ?>
<script src="../script/recherche.js"></script>
</body>
</html>