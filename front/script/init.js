function init()
{
    $(document).ready(function ()
    {
        $.ajaxSetup({
            headers:{
                'Authorization': getCookie('jwt')
            }
        });

        // $('#profil_form')[0].reset();
        $.get(
            '../../services/init.php',
            function (response) {
                try {
                    if (response) {
                        var row = JSON.parse(response);
                        insertInfos(row);
                    }
                    else
                        console.log("no response");
                        //document.location.href = "../src/accueil.php";
                }
                catch (e) {
                    console.log("error");
                    //document.location.href = "../src/accueil.php";
                }
            },
            'text'
        );

        $.post(
            '../../services/initPosition.php',
            function(response)
            {
                if (response)
                {
                    var rows = JSON.parse(response);
                    insertPositions(rows)
                }
            }
        )

    });
}

function getCookie(name)
{
    var real_name = name + '=';
    if (document.cookie.search(real_name) === 0)
    {
        return document.cookie.split(real_name)[1].split(';')[0];
    }

    return '';
}

function insertInfos(row)
{
    document.getElementById('email').setAttribute('value', format('email', row));
    document.getElementById('lastname').setAttribute('value', format('lastname', row));
    document.getElementById('firstname').setAttribute('value', format('firstname', row));
    document.getElementById('phone').setAttribute('value', format('phone', row));
    document.getElementById('department').setAttribute('value', format('department', row));
    document.getElementById('company').setAttribute('value', format('company', row));

    var img = document.createElement("img");
    var image = document.getElementById('image');

    img.id = "photo";
    img.setAttribute("src", photo_path + row["photo"]);
    img.setAttribute("onerror", "this.src=" + default_photo);
    image.innerHTML = "";

    image.appendChild(img);
}

function insertPositions(rows)
{
    deleteAllPositions();
    for (var i in rows)
    {
        addAPosition(rows[i])
    }
}

document.getElementById('deconnexion').addEventListener('click', function () {
    document.cookie = "jwt=";
    init();
});
