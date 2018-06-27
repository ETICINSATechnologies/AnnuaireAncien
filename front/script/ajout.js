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