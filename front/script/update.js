function update(create)
{
    $(document).ready(function ()
    {
        create = create || false;
        var attributs = ['firstname', 'lastname', 'email', 'phone', 'company', 'mandate_year', 'department', 'etic_position'];
        var parameters = getFormValues("#profil_form");
        var info_area = document.getElementById("info_area");
        var img = document.getElementById("image");
        img.style.setProperty("animation-name", "");
        info_area.innerText = "";
        parameters = lowercase(parameters, attributs);

        if (create)
            attributs['password'] = "";

        if (checkparam(parameters))
        {
            $.get(
                '../../services/update.php',
                parameters,
                function (response)
                {
                    info_area.style.setProperty("color", "red");
                    img.style.setProperty("animation-name", "hideImg");
                    try
                    {
                        if (response)
                        {
                            info_area.innerHTML = "<p> Les informations ont bien été sauvegardées!</p>";
                            info_area.style.setProperty("color", "#009e11");
                            init();
                        }
                        else
                        {
                            info_area.innerHTML = "<p style='color: red'> Un problème est survenu lors de la sauvegarde Veuillez réessayer !</p>";
                        }
                    }
                    catch (e)
                    {
                        info_area.innerHTML = "<p style='color: red'> Un problème est survenu lors de la sauvegarde Veuillez réessayer !</p>";
                    }
                },
                'text'
            );
        }
        else
        {
            document.getElementById("info_area").innerHTML = "<p style='color: red'> Veuillez saisir votre nom, prénom et email ! </p>";
        }
    });
}

function lowercase(array, attributs)
{
    for (i = 0; i < attributs.length; i++)
    {
        if (array[attributs[i]] != null)
        {
            array[attributs[i]] = array[attributs[i]].toLowerCase();
        }
        else
        {
            array[attributs[i]] = '';
        }
    }

    return array;
}

function checkparam(array)
{
    return !(array['firstname'] === undefined || array['lastname'] === undefined || array['email'] === undefined);
}


$(document).ready(function ()
{
    $("#profil_form").keypress(function (event)
    {
        if (event.key === "Enter")
            update();
    });
});

function checkPassword(old_password)
{
    $.get(
        '../../services/checkPassword.php',
        {"password": old_password},
        function (response)
        {
            if (response)
            {

            }
            else
            {

            }
        },
        'text'
    );
    return r;
}

function changePassword(new_password)
{
    var info_area = document.getElementById("info_area");
    var img = document.getElementById("image");

    info_area.style.setProperty("color", "red");
    img.style.setProperty("animation-name", "hideImg");

    $.get(
        '../../services/update.php',
        {"password": new_password},
        function (response)
        {
            try
            {
                if (response)
                {
                    info_area.innerHTML = "<p> Les informations ont bien été sauvegardées!</p>";
                    info_area.style.setProperty("color", "#009e11");
                    init();
                }
                else
                {
                    info_area.innerHTML = "<p style='color: red'> Un problème est survenu, veuillez recommencer ultérieurement!</p>";
                }
            }
            catch (e)
            {
                info_area.innerHTML = "<p style='color: red'> Un problème est survenu lors de la sauvegarde, veuillez recommencer ultérieurement!</p>";
            }
        },
        'text'
    );
}


function updatePassword()
{
    var parameters = getFormValues("#password_form");
    var password_info = document.getElementById("password_info");

    if (Object.keys(parameters).length !== 3)
    {
        password_info.innerHTML = "<p> Compléter tous les champs </p>"
    }
    else if (parameters["new_password"] === parameters["confirmed_new_password"])
    {
        $.get(
            '../../services/checkPassword.php',
            {"password": parameters['old_password']},
            function (response)
            {
                console.log(response);
                if (response === "true")
                {
                    changePassword(parameters["new_password"]);
                    document.getElementById('password_window').style.display = 'none';
                    document.getElementById('form_area').style.setProperty("opacity", "");
                }
                else
                    password_info.innerHTML = "<p> Mot de passe incorrect </p>";
            }
        );
    }
    else
    {
        password_info.innerHTML = "<p> Mots de passes différents ! </p>"
    }
}

