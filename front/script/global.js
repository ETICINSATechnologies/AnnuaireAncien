function getFormValues()
{
    var validValues = {};
    var validRequest = false;

    $("#form").children(":text").each(function ()
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


function format(attribute, stringToFormat)
{
    var newString;

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
        newString = stringToFormat[0].toUpperCase();
        newString += stringToFormat.slice(1).toLowerCase();
    }

    return newString;
}
