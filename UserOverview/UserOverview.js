$(this).ready(loadUser());

function loadUser()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState === 4  && this.status === 200)
        {
            generateUserTable(JSON.parse(this.responseText));
        }
    }
    xmlhttp.open("GET","UserApi.php?q=0&type=0",true);
    xmlhttp.send();
}

function generateUserTable(user)
{
    for(var i=0; i<user.length; i++) {
        if (user[i][2] === 1)
            var buttonValue = 'Revoke';
        else
            var buttonValue = 'Grant';
        console.log(buttonValue);

        $('table').append('<tr class="'+user[i][0]+'">' +
            '<td>'+user[i][0]+'</td>' +
            '<td>'+user[i][1]+'</td>' +
            '<td><button id="'+user[i][0]+'" onclick="managePriviliges(this.id)">'+buttonValue+'</button></td>' +
            '<td><button id="'+user[i][0]+'" onclick="deleteUser(this.id)">Delete</button></td>' +
            '</tr>');
    }
}

function managePriviliges(id)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","UserApi.php?q="+id+"&type=1",true);
    xmlhttp.send();
    if ($('#'+id).text() === "Revoke")
    {
        $('#'+id).html("Grant");
    }
    else
        $('#'+id).html("Revoke");
}

function deleteUser(id)
{
    $('.'+id).fadeOut();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","UserApi.php?q="+id+"&type=2",true);
    xmlhttp.send();
}