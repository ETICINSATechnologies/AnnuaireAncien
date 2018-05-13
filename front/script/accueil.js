$(document).ready(function ()
{
    console.log("hello there");
    $.get(
        '../../services/rechercheCA.php',
        function (response)
        {
            try
            {
                var ca_members = JSON.parse(response);
                var ca_length = ca_members.length;
                var middle_position = Math.floor(ca_length/ 2 + 0.5);
                var height_dispo = $("#mandat_left").height();
                var height_div_left = height_dispo / middle_position;
                var height_div_right = height_dispo / (ca_length - middle_position);
                var position = 1;

                document.getElementById("mandat_left").style.setProperty(
                    "grid-template-rows", "repeat(" + middle_position + ", " + height_div_left + "px)");
                document.getElementById("mandat_right").style.setProperty(
                    "grid-template-rows", "repeat(" + (ca_length - middle_position) + ", " + height_div_right + "px");

                for (var i in ca_members)
                {
                    position = displayCAMember(ca_length, position, ca_members[i]);
                }
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

function displayCAMember(ca_length, position, ca_member)
{
    var container;
    var img = document.createElement("img");
    var div = document.createElement("div");
    var p = document.createElement("p");

    if (position > ca_length / 2)
    {
        container = document.getElementById("mandat_left");
    }
    else
    {
        container = document.getElementById("mandat_right")
    }

    img.setAttribute("src", photo_path + format("photo", ca_member));
    img.setAttribute("onerror", "this.src=" + default_photo);

    p.innerHTML += format("firstname", ca_member) + " ";
    p.innerHTML += format("lastname", ca_member) + "<br>";
    p.innerHTML += format("etic_position", ca_member);

    img.id = "img_member" + position;
    p.id = "p_member" + position;
    div.id = "member" + position;

    div.appendChild(img);
    div.appendChild(p);

    container.appendChild(div);

    var div_height = document.getElementById(div.id).clientHeight;
    var p_height = document.getElementById(p.id).clientHeight;

    document.getElementById(img.id).clientHeight = div_height - p_height;

    return ++position;
}