function update()
{
    $(document).ready(function ()
    {
        var attributs = ['firstname', 'lastname', 'email', 'phone', 'company', 'mandate_year', 'department', 'etic_position'];
        var parameters = getFormValues("#profil_form");
        var info_area = document.getElementById("info_area");
        var img = document.getElementById("image");
        var bol = checkparam(parameters);

        img.style.setProperty("animation-name", "");
        info_area.innerText = "";
        parameters = lowercase(parameters, attributs);

        if (bol)
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
                            info_area.innerHTML = "<p style='color: red'> Un problème est survenu lors de la sauvegarde de vos informations, veuillez recommencer ultérieurement!</p>";
                        }
                    }
                    catch (e)
                    {
                        info_area.innerHTML = "<p style='color: red'> Un problème est survenu lors de la sauvegarde de vos informations, veuillez recommencer ultérieurement!</p>";
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
    /*array['firstname']=array['firstname'].toLowerCase();
    array['lastname']=array['lastname'].toLowerCase();
    array['email']=array['email'].toLowerCase();
    array['phone']=array['phone'].toLowerCase();
    array['company']=array['company'].toLowerCase();
    array['mandate_year']=array['mandate_year'].toLowerCase();
    array['department']=array['department'].toLowerCase();
    array['etic_position']=array['etic_position'].toLowerCase();*/
    return array;
}

function checkparam(array)
{
    if (array['firstname'] === undefined || array['lastname'] === undefined || array['email'] === undefined) return false;
    else return true;
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
    var password_info = document.getElementById("password_info");

    $.get(
        '../../services/update.php',
        {"password" : old_password},
        function (response)
        {
            try
            {
                if (response)
                {
                    init();
                }
                else
                {
                    password_info.innerHTML = "<p> Mot de passe incorrect </p>";
                }
            }
            catch (e)
            {
                password_info.innerHTML = "<p> Une erreur est survenue </p>";
            }
        },
        'text'
    );
}

function changePassword(new_password)
{
    var info_area = document.getElementById("info_area");
    var img = document.getElementById("image");

    info_area.style.setProperty("color", "red");
    img.style.setProperty("animation-name", "hideImg");

    $.get(
        '../../services/update.php',
        {"password" : new_password},
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
                    info_area.innerHTML = "<p style='color: red'> Un problème est survenu lors de la sauvegarde de vos informations, veuillez recommencer ultérieurement!</p>";
                }
            }
            catch (e)
            {
                info_area.innerHTML = "<p style='color: red'> Un problème est survenu lors de la sauvegarde de vos informations, veuillez recommencer ultérieurement!</p>";
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
        checkPassword(parameters["old_password"]);
        changePassword(parameters["new_password"]);
        document.getElementById('password_window').style.display = 'none';
        document.getElementById('form_area').style.setProperty("opacity", "");
    }
    else
    {
        password_info.innerHTML = "<p> Mots de passes différents ! </p>"
    }
}