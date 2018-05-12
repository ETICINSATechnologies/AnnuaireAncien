<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <link rel="stylesheet" href="../style/ordinateur/recup.css">
</head>

<body>
<?php include 'header.php'; ?>
<?php include 'nav.php'; ?>

<section id="section1">
    <div id="div1">
        Afin de récupérer vos identifiants, veuillez contacter par mail l'administrateur de ce site en utilisant
        l'adresse mail suivante :
    </div>
    <button id="div2" onclick=CopyToClipboard("div2")> admin.annuaire@etic-insa.com</button>
    <div id="div3"> adresse copié ! </div>
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
