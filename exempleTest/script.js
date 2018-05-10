function getFormValues1()
{
    var validValues = {};
    var validRequest = false;

    $("#form").children(":text").each(function ()
    {
        if (this.value !== '')
        {
            validRequest = true;
            console.log(this.value.toLowerCase());
            validValues[this.id] = this.value;
        }
    });

    if (validRequest)
        return validValues;
    return false;
}


function format1(attribute, stringToFormat)
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


function createTable(attributes, columnsName, rows, htmlId)
{
    var table = document.createElement("table");
    var tbody = document.createElement("tbody");
    var tr = document.createElement("tr");
    var cell = document.createElement("th");
    var cellText;

    if (rows.length > 0)
    {
        for (var i = 0; i < columnsName.length; i++)
        {
            cell = document.createElement("th");
            cellText = document.createTextNode(columnsName[i]);
            cell.appendChild(cellText);
            tr.appendChild(cell);
        }

        table.appendChild(tr);

        for (var j = 0; j < rows.length; j++)
        {
            tr = document.createElement("tr");
            for (var k = 0; k < attributes.length; k++)
            {
                cell = document.createElement("td");
                cellText = document.createTextNode(format1(attributes[k], rows[j][attributes[k]]));
                cell.appendChild(cellText);
                tr.appendChild(cell);
            }
            tr.id = rows[j]["id"];
            tbody.appendChild(tr);
        }
        table.appendChild(tbody);
        document.getElementById(htmlId).innerHTML = "";
        document.getElementById(htmlId).appendChild(table);
    }
    else
    {
        document.getElementById(htmlId).innerHTML = "<p> No result found ! </p>";
    }
}


function listen()
{
    $("td").on({
        "mousedown": function (evt)
        {
            var element = evt.target.parentNode;
            console.log(element.id);
        }
    })
}


function search()
{
    $(document).ready(function ()
    {
        var parameters = getFormValues();

        if (parameters)
        {
            $.post(
                'recherche.php',
                parameters,
                function (response)
                {
                    try
                    {
                        createTable(
                            ["lastname", "firstname", "etic_position", "mandate_year"],
                            ["nom", "prénom", "poste", "année de mandat"],
                            JSON.parse(response),
                            "response"
                        );
                        listen();
                    }
                    catch (e)
                    {
                        console.log(e);
                        document.getElementById("response").innerHTML = "<p> No result found ! </p>" + response;
                    }
                },
                'text'
            );
        }
        else
        {
            document.getElementById("response").innerHTML = "<p> Veuillez compléter au moins un champs du formulaire ! </p>";
        }
    });
}
