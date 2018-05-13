
function update()
{
    $(document).ready(function ()
    {
        var parameters = getFormValues("#profil_form");

        parameters=lowercase(parameters);
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
function lowercase(array){
    array['firstname']=array['firstname'].toLowerCase();
    array['lastname']=array['lastname'].toLowerCase();
    array['email']=array['email'].toLowerCase();
    array['phone']=array['phone'].toLowerCase();
    array['company']=array['company'].toLowerCase();
    array['mandate_year']=array['mandate_year'].toLowerCase();
    array['department']=array['department'].toLowerCase();
    array['etic_position']=array['etic_position'].toLowerCase();
    return array;
}
/*
function updateImage()
{

   /* var parameters = getFormValues("#fichiers");
    $.get(
        '../../services/updatePicture.php',
        parameters,
        function (response)
        {
            try
            {
                if(response){

                    console.log(response);

                }
            }
            catch (e)
            {
                document.getElementById("info_area").innerHTML = "<p id='p_info'> La recherche que vous avez effectuée " +
                    "n'a donné aucun résultats. <br>" + "Assurez-vous d'avoir correctement saisi les informations </p>";
            }
        },
        'text'
    );
    $("#save_file").click(function(){

        $.ajax({
            url : '../../services/updatePicture.php', // La ressource ciblée
            type : 'GET', // Le type de la requête HTTP

            dataType : 'json', // Le type de données à recevoir, ici, du HTML.
            success : function(data){ // code_html contient le HTML renvoyé

                    var titi=JSON.parse(data);
                    console.log("TOUT MARHCE");
                    console.log(titi);

            }
        });

    });


}*/

