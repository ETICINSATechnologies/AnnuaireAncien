var photo_path = "../../public/image/";
var default_photo = "'" + photo_path + "no_photo.png'";

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
    $(form_id).children(":password").each(function ()
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


function format(name, values)
{
    var oldString = values[name];
    var newString = oldString;

    if (oldString === null)
    {
        newString = "";
    }
    else if (oldString === undefined)
    {
        newString = "non précisé";
    }
    else if (name === "lastname")
    {
        newString = oldString.toUpperCase();
    }
    else if (name === "firstname" || name === "company" || name === "department")
    {
        newString = oldString[0].toUpperCase();
        newString += oldString.slice(1).toLowerCase();
    }
    else if (name === "etic_position")
    {
        try
        {
            newString = oldString[0].toUpperCase();
            newString += oldString.split(" ")[0].slice(1).toLowerCase();
            newString += " " + oldString.split(" ")[1].toUpperCase();
        } catch (e)
        {
            newString = oldString.toUpperCase();
        }
    }

    return newString
}


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
