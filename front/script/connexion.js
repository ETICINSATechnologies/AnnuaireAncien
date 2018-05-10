
function connect()
{
    $(document).ready(function ()
    {
        var parameters = getFormValues("#connect_form");

        document.getElementById("response_area").innerText = "";

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
                            document.getElementById("response_area").innerHTML = "<p> Identifiant ou mot de passe invalide !</p>";
                        }
                    }
                    catch (e)
                    {
                        document.getElementById("response_area").innerHTML = "<p> Identifiant ou mot de passe invalide !</p>";
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


