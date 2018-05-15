$(document).ready(function ()
{
    $.get(
        '../../services/rechercheCA.php',
        function (response)
        {
            try
            {
                var ca_members = JSON.parse(response);
                var ca_length = ca_members.length;
                var position = 1;

                for (var i in ca_members)
                {
                    position = displayCAMember(ca_length, position, ca_members[i]);
                }

                resizeCAMembers("mandat_left");
                resizeCAMembers("mandat_right");
                listenCA();
            }
            catch (e)
            {
                document.getElementById("info_area").innerHTML = "<p id='p_info'> La recherche que vous avez effectuée " +
                    "n'a donné aucun résultats. <br>" + "Assurez-vous d'avoir correctement saisi les informations </p>";
            }
        },
        'text'
    );
});

function resizeCAMembers(mandatName)
{
    var mandat = document.getElementById(mandatName);

    var CANumber = mandat.children.length;
    var heightDispo = 0.95 * mandat.clientHeight;
    var heightDiv = heightDispo / CANumber;
    console.log(heightDispo);

    mandat.style.setProperty("grid-template-rows", "repeat(" + CANumber + ", " + heightDiv + "px)");
}


function displayCAMember(ca_length, position, ca_member)
{
    var container;
    var img = document.createElement("img");
    var div = document.createElement("div");
    var p = document.createElement("p");

    if (position > ca_length / 2)
        container = document.getElementById("mandat_left");
    else
        container = document.getElementById("mandat_right");

    img.setAttribute("src", photo_path + format("photo", ca_member));
    img.setAttribute("onerror", "this.src=" + default_photo);

    p.innerHTML += format("firstname", ca_member) + " ";
    p.innerHTML += format("lastname", ca_member) + "<br>";
    p.innerHTML += format("etic_position", ca_member);

    img.id = "img_member" + ca_member["id"];
    p.id = "p_member" + ca_member["id"];
    div.id = ca_member["id"];
    div.className = "member";

    div.appendChild(img);
    div.appendChild(p);

    container.appendChild(div);

    var div_height = document.getElementById(div.id).clientHeight;
    var p_height = document.getElementById(p.id).clientHeight;

    document.getElementById(img.id).clientHeight = div_height - p_height;

    return ++position;
}

function listenCA()
{
    $(".member *").on({
        "mousedown": function (evt)
        {
            var element = evt.target.parentNode;

            window.location = "recherche.php?id=" + element.id;
        }
    })
}

window.addEventListener("resize", function (ev)
{
    resizeCAMembers("mandat_left");
    resizeCAMembers("mandat_right");
});
