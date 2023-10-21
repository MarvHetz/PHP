$(this).ready(loadTickets());

function loadTickets()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState === 4  && this.status === 200)
        {
            document.getElementById('Tickets').innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","GetTickets.php",true);
    xmlhttp.send();

    document.querySelector('button').addEventListener('click',test);
}

function test()
{
    console.log('test');
}