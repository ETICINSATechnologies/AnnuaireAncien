function update()
{
    $(document).ready(function ()
    {
        var attributs = ['firstname', 'lastname', 'email', 'phone', 'company', 'mandate_year', 'department', 'etic_position'];
        var parameters = getFormValues("#profil_form");
        var info_area = document.getElementById("info_area");
        var bol = checkparam(parameters);
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

