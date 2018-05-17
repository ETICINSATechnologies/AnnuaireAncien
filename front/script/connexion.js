
function connect()
{
    $(document).ready(function ()
    {
        var parameters = getFormValues("#connect_form");

        document.getElementById("info_area").innerText = "";

        if (Object.keys(parameters).length === 2)
        {
            parameters['email']=parameters['email'].toLowerCase();

            $.get(
                '../../services/connexion.php',
                parameters,
                function (response)
                {
                    try
                    {
                        if(response){
                            if(response==='admin'){
                                document.location.href="ajout.php";
                            }
                            else{
                                document.location.href="profil.php";
                            }

                        }
                        else{
                            document.getElementById("info_area").innerHTML = "Identifiant ou mot de passe invalide !";
                        }
                    }
                    catch (e)
                    {
                        document.getElementById("info_area").innerHTML = "Identifiant ou mot de passe invalide !";
                    }
                },
                'text'
            );
        }
        else
        {
            document.getElementById("info_area").innerHTML = "Veuillez compléter tous les champs du formulaire !";
        }
    });
}

$(document).ready(function ()
{
    $("#connect_form").keypress(function (event)
    {
        if (event.key === "Enter")
            connect();
    });
});

