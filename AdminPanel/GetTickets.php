<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, td, th {
        border: 1px solid black;
        padding: 5px;
    }

    th {text-align: center;}
    td {text-align: center;}
    button
    {
        background: transparent;
        box-sizing: border-box;
        width: 60%;
        border: 2px solid rgb(71, 57, 83);
        border-radius: 35px;

    }
</style>
<body>

<script>
    function test()
    {
        console.log('test');
    }
</script>

<?php
include '../DBHandler.php';

$dbHandler = new dbHandler();

$result = $dbHandler->getAllTickets();
echo "<table>
        <tr>
            <th>TicketID</th>
            <th>User E-Mail</th>
            <th>Shortdescription</th>
            <th>Longdescription</th>
            <th>Mark as Solved</th>
        </tr>";

foreach ($result as $row)
{
    $id = $row['id'];
    echo "<tr class= '$id'>";
    echo "<td>" . $row['id']."</td>";
    echo "<td>" . $row['email']."</td>";
    echo "<td>" . $row['shortdescription']."</td>";
    echo "<td>" . $row['longdescription']."</td>";
    echo "<td><input type='button' value='Solved'  onclick=\"markTicketSolved()\" id='$id'></td>";
    echo "</tr>";
}
echo '</table>'
?>
</body>
</html>

