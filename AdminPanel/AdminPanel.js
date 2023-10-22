$(this).ready(loadTickets());

function loadTickets()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState === 4  && this.status === 200)
        {
            generateTicketTable(JSON.parse(this.responseText));
        }
    }
    xmlhttp.open("GET","TicketApi.php?q=0",true);
    xmlhttp.send();
}

function generateTicketTable(tickets)
{
    for(var i=0; i<tickets.length; i++) {
        $('table').append('<tr id="'+tickets[i][0]+'">' +
            '<td>'+tickets[i][0]+'</td><td>'+tickets[i][1]+'</td>' +
            '<td><textarea>'+tickets[i][2]+'</textarea></td>' +
            '<td><textarea>'+tickets[i][3]+'</textarea></td>' +
            '<td><button id="'+tickets[i][0]+'" onclick="markTicketAsSolved(this.id)">Solved</button></td></tr>');
    }
}

function markTicketAsSolved(id)
{
    $('#'+id).fadeOut();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","TicketApi.php?q="+id,true);
    xmlhttp.send();
}