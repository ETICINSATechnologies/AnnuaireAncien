<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <link rel="stylesheet" href="../style/ordinateur/aide.css">
</head>

<body>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<section>
    <div id="div1">
        Cette application a été développée par
    </div>
    <a id="div2" href="http://etic-insa.com/"> ETIC INSA Technologies </a>
    <div id="div3">
        Elle permet de rechercher les anciens membres de la Junior en fonction de divers critères comme leur nom,
        prénom, entreprise pour laquelle ils travaillent ou encore leur année de mandat <br><br>
        Si vous avez des remarques ou suggestions, merci d'en faire par à
        <button id="div4" onclick=CopyToClipboard("div2")> admin.annuaire@etic-insa.com</button>
        <div id="div5"> adresse copié ! </div
    </div>
</section>

<?php include 'footer.php'; ?>
<?php include '../script/config.php'; ?>
<script>
    function CopyToClipboard(containerid)
    {
        var textarea = document.createElement('textarea');

        textarea.id = 'temp_element';
        textarea.style.height = "0";

        document.body.appendChild(textarea);

        textarea.value = document.getElementById(containerid).innerText;

        var selector = document.getElementById(textarea.id);
        selector.select();

        document.execCommand('copy');
        document.body.removeChild(textarea);

        document.getElementById("div3").style.setProperty("animation-name", "display");
    }

</script>
</body>
</html>
