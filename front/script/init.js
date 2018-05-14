function init()
{
    $(document).ready(function ()
    {
        $.get(
            '../../services/init.php',
            function (response)
            {
                console.log(response);
                try
                {
                    if (response)
                    {
                        var row = JSON.parse(response);

                        insertInfos(row);
                    }
                    else
                    {
                        document.location.href = "accueil.php";
                    }
                }
                catch (e)
                {
                    document.location.href = "accueil.php";
                }
            },
            'text'
        );

    });
}

function insertInfos(row)
{
    document.getElementById('email').setAttribute('value', format('email', row));
    document.getElementById('lastname').setAttribute('value', format('lastname', row));
    document.getElementById('firstname').setAttribute('value', format('firstname', row));
    document.getElementById('phone').setAttribute('value', format('phone', row));
    document.getElementById('department').setAttribute('value', format('department', row));
    document.getElementById('etic_position').setAttribute('value', format('etic_position', row));
    document.getElementById('company').setAttribute('value', format('company', row));
    document.getElementById('mandate_year').setAttribute('value', format('mandate_year', row));

    var img = document.createElement("img");
    img.setAttribute("src", photo_path + row["photo"]);
    img.setAttribute("onerror", "this.src=" + default_photo);

    var image = document.getElementById('image');
    image.innerHTML = ""; //<img id=logo +  + src=" + photo_path + row['photo'] + " >";
    image.appendChild(img);
}

