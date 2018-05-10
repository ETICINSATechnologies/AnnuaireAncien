function search()
{
    $(document).ready(function ()
    {
        var parameters = getFormValues("#search_form");

        document.getElementById("response_area").innerText = "";

        if (parameters)
        {
            $.get(
                '../../services/recherche.php',
                parameters,
                function (response)
                {
                    console.log(response);
                    try
                    {
                        document.getElementById("info").innerHTML = "";
                        createTable(
                            ["lastname", "firstname", "etic_position", "mandate_year"],
                            ["nom", "prénom", "poste", "année de mandat"],
                            JSON.parse(response),
                            "response_area",
                            "info"
                        );
                        listen();
                    }
                    catch (e)
                    {
                        document.getElementById("info").innerHTML = "<p> La recherche que vous avez effectuée " +
                            "n'a donné aucun résultats. <br>" + "Assurez-vous d'avoir correctement saisi les informations </p>";
                    }
                },
                'text'
            );
        }
        else
        {
            document.getElementById("info").innerHTML = "<p> Veuillez compléter au moins un champs du formulaire ! </p>";
        }
    });
}

function createTable(attributes, columnsName, rows, htmlId, infoId)
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
                //console.log(attributes[k] + " : " + rows[j][attributes[k]]);
                cell = document.createElement("td");
                cellText = document.createTextNode(rows[j][attributes[k]]);
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
        document.getElementById(infoId).innerHTML = "<p> La recherche que vous avez effectuée " +
            "n'a donné aucun résultats. <br>" + "Assurez-vous d'avoir correctement saisi les informations </p>";
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