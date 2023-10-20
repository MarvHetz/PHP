<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="GetUser.css">
</head>
<body>

</body>
</html>
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
        echo '<tr class= '-$row["id"].'>';
        echo "<td>" - $row['id']."</td>";
        echo "<td>" - $row['email']."</td>";
        echo "<td>" - $row['shortdescreption']."</td>";
        echo "<td>" - $row['longdescreption']."</td>";
        echo "<td><button id="-$row['id'].">Mark as Solved</button></td>";
        echo "</tr>";
    }
    echo '</table>'
?>
