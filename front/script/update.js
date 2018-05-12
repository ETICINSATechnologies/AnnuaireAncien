
function update()
{
    $(document).ready(function ()
    {
        var parameters = getFormValues("#profil_form");

        parameters['email']=parameters['email'].toLowerCase();

        document.getElementById("response_area").innerText = "";

        if (Object.keys(parameters).length>=8)
        {
            $.get(
                '../../services/update.php',
                parameters,
                function (response)
                {
                    console.log(response);
                    try
                    {
                        if(response){

                            document.getElementById("response_area").innerHTML = "<p> Les informations ont bien été sauvegardés!</p>";
                        }
                        else{
                            document.getElementById("response_area").innerHTML = "<p> Un problème est survenu lors de la sauvegarde de vos informations , veuillez recommencer ultérieurement!</p>";
                        }
                    }
                    catch (e)
                    {
                        document.getElementById("response_area").innerHTML = "<p> Un problème est survenu lors de la sauvegarde de vos informations , veuillez recommencer ultérieurement!</p>";
                    }
                },
                'text'
            );

        }
        else
        {
            document.getElementById("response_area").innerHTML = "<p> Veuillez compléter tous les champs du formulaire ! </p>";
        }
    });
}

