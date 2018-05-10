function getFormValues(form_id)
{
    var validValues = {};
    var validRequest = false;

    $(form_id).children(":text").each(function ()
    {
        if (this.value !== '')
        {
            validRequest = true;
            validValues[this.id] = this.value;
        }
    });

    if (validRequest)
        return validValues;
    return false;
}


/*function format(attribute, stringToFormat)
{
    var newString;
    console.log(attribute, stringToFormat);

    if (attribute === "lastname")
    {
        newString = stringToFormat.toUpperCase();
    }
    else if (attribute === "etic_position")
    {
        newString = stringToFormat[0].toUpperCase();
        newString += stringToFormat.split(" ")[0].slice(1).toLowerCase();
        newString += " " + stringToFormat.split(" ")[1].toUpperCase();
    }
    else
    {
        try {
            newString = stringToFormat[0].toUpperCase();
            newString += stringToFormat.slice(1).toLowerCase();
        }
        catch (e)
        {
            newString = stringToFormat;
        }
    }

    return newString;
}*/


$("#accueil").click(function ()
{
    window.location = "accueil.php";
});

$("#title").click(function(){
    window.location = "accueil.php";
});

$("#rechercher").click(function ()
{
   window.location = "recherche.php";
});

$("#connexion").click(function ()
{
    window.location = "connexion.php";
});

$("#profil").click(function ()
{
    window.location = "profil.php";
});

$("#admin").click(function ()
{
    window.location = "admin.php";
});

$("#help_icon").click(function ()
{
    window.location = "aide.php";
});
