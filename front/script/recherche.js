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
                    try
                    {
                        document.getElementById("info_area").innerHTML = "";
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
                        document.getElementById("info_area").innerHTML = "<p> La recherche que vous avez effectuée " +
                            "n'a donné aucun résultats. <br>" + "Assurez-vous d'avoir correctement saisi les informations </p>";
                    }
                },
                'text'
            );
        }
        else
        {
            document.getElementById("info_area").innerHTML = "<p> Veuillez compléter au moins un champs du formulaire ! </p>";
        }
    });
}

function getInfoMember(id)
{
    $.get(
        '../../services/recherche.php',
        {'id': id},
        function (response)
        {
            try
            {
                displayInfoMember(JSON.parse(response), "info_area");
            }
            catch (e)
            {
                document.getElementById("info_area").innerHTML = "<p> La recherche que vous avez effectuée " +
                    "n'a donné aucun résultats. <br>" + "Assurez-vous d'avoir correctement saisi les informations </p>";
            }
        },
        'text'
    );
}

function createTable(attributes, columnsName, rows, htmlId, infoId)
{
    var table = document.createElement("table");
    var thead = document.createElement("thead");
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
        thead.appendChild(tr);

        for (var j = 0; j < rows.length; j++)
        {

            tr = document.createElement("tr");
            for (var k = 0; k < attributes.length; k++)
            {
                cell = document.createElement("td");
                cellText = document.createTextNode(rows[j][attributes[k]]);
                cell.appendChild(cellText);
                tr.appendChild(cell);
            }
            tr.id = rows[j]["id"];
            tbody.appendChild(tr);
        }
        table.appendChild(thead);
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

function format(name, values)
{
    var oldString = values[name];
    var newString = oldString;
    console.log(name + " : " + values[name]);

    if (oldString === undefined)
    {
        newString = "non précisé";
    }
    else if (name === "lastname" || name === "department")
    {
        newString = oldString.toUpperCase();
    }
    else if (name === "firstname")
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

function displayInfoMember(infos, htmlId)
{
    infos = infos[0];

    var div = document.getElementById(htmlId);
    var div_info = document.createElement("div");
    var nomPrenom = document.createElement("p");
    var tel = document.createElement("p");
    var coordonnees = document.createElement("p");

    nomPrenom.innerHTML = format("firstname", infos) + " <br/> " + format("lastname", infos);
    tel.innerText = format("phone", infos);
    coordonnees.innerHTML =
        "mail : " + format("email", infos) + " <br/> " +
        "travaille chez : " + format("company", infos) + " <br/> " +
        "année de mandat : " + format("mandate_year", infos) + " <br/> " +
        "poste chez Etic : " + format("etic_position", infos) + " <br/> " +
        "département : " + format("department", infos);

    div_info.id = "info";
    nomPrenom.id = "nom_prenom";
    nomPrenom.className = "right";
    tel.className = "right";
    coordonnees.id = "coordonnes";

    div.innerText = "";
    div.appendChild(div_info);
    div_info.appendChild(nomPrenom);
    div_info.appendChild(tel);
    div_info.appendChild(coordonnees);
}

function listen()
{
    $("td").on({
        "mousedown": function (evt)
        {
            var element = evt.target.parentNode;
            getInfoMember(element.id);
        }
    })
}