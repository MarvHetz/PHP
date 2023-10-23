<?php
include '../DBHandler.php';

$dbHandler = new dbHandler();

if (intval($_GET['q']) == 0)
{
    $result = $dbHandler->getAllTickets();
    $tickets = array();

    foreach ($result as $row)
    {
        array_push($tickets,[$row['id'],$row['email'],$row['shortdescription'],$row['longdescription']]);
    }
    echo json_encode($tickets);
}
else
{
    $dbHandler->markTicketAsSolved(intval($_GET['q']));
}
?>

