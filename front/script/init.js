function init()
{
    $(document).ready(function ()
    {
        $.post(
            '../../services/init.php',
            function (response)
            {
                try
                {
                    if (response)
                    {
                        var row = JSON.parse(response);
                        insertInfos(row);
                    }
                    else
                    {
                        document.location.href = "../src/accueil.php";
                    }
                }
                catch (e)
                {
                    document.location.href = "../src/accueil.php";
                }
            },
            'text'
        );

        $.post(
            '../../services/initPosition.php',
            function(response)
            {
                try
                {
                    if (response)
                    {
                        var rows = JSON.parse(response);
                        insertPositions(rows)
                    }
                }
                catch(e)
                {
                    document.location.href = "../src/accueil.php";
                }
            }
        )

    });
}

function insertInfos(row)
{
    document.getElementById('email').setAttribute('value', format('email', row));
    document.getElementById('lastname').setAttribute('value', format('lastname', row));
    document.getElementById('firstname').setAttribute('value', format('firstname', row));
    document.getElementById('phone').setAttribute('value', format('phone', row));
    document.getElementById('department').setAttribute('value', format('department', row));
    document.getElementById('company').setAttribute('value', format('company', row));
    // document.getElementById('etic_position').setAttribute('value', format('etic_position', row));
    // document.getElementById('mandate_year').setAttribute('value', format('mandate_year', row));

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
