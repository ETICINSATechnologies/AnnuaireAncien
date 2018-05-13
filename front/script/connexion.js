
function connect()
{
    $(document).ready(function ()
    {
        var parameters = getFormValues("#connect_form");

        parameters['email']=parameters['email'].toLowerCase();

        document.getElementById("info_area").innerText = "";

        if (Object.keys(parameters).length===2)
        {
            $.get(
                '../../services/connexion.php',
                parameters,
                function (response)
                {
                    console.log(response);
                    try
                    {
                        if(response){
                            document.location.href="profil.php";
                        }
                        else{
                            document.getElementById("info_area").innerHTML = "<p> Identifiant ou mot de passe invalide !</p>";
                        }
                    }
                    catch (e)
                    {
                        document.getElementById("info_area").innerHTML = "<p> Identifiant ou mot de passe invalide !</p>";
                    }
                },
                'text'
            );
        }
        else
        {
            document.getElementById("info_area").innerHTML = "<p> Veuillez compléter tous les champs du formulaire ! </p>";
        }
    });
}


