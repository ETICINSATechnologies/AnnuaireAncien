
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
                    if(response){
                        var row=JSON.parse(response);

                        insertInfos(row);
                    }
                    else{
                        document.location.href="accueil.php";
                    }
                }
                catch (e)
                {
                    document.location.href="accueil.php";
                }
            },
            'text'
        );

    });
}
function insertInfos (row)
{
    document.getElementById('email').setAttribute('value',row['email']);
    document.getElementById('lastname').setAttribute('value',row['lastname']);
    document.getElementById('firstname').setAttribute('value',row['firstname']);
    document.getElementById('phone').setAttribute('value',row['phone']);
    document.getElementById('department').setAttribute('value',row['department']);
    document.getElementById('etic_position').setAttribute('value',row['etic_position']);
    document.getElementById('company').setAttribute('value',row['company']);
    document.getElementById('mandate_year').setAttribute('value',row['mandate_year']);
    document.getElementById('image').innerHTML="<img id=logo + src="+"../../public/image/"+row['photo']+" >";
}

