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

    if (oldString === "" || oldString === null)
    {
        newString = "";
    }
    else if (oldString === undefined)
    {
        newString = "";
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
            newString += oldString.slice(1).toLowerCase();
        } catch (e)
        {
            newString = oldString.toLowerCase();
        }
    }

    return newString
}


$("#help_icon").click(function ()
{
    window.location = "aide.php";
});
