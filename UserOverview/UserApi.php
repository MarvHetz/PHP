<?php
include '../DBHandler.php';

$dbHandler = new dbHandler();
session_start();

if (intval($_GET['type']) == 0)
{
    $result = $dbHandler->getAllUsers($_SESSION['userid']);
    $user = array();

    foreach ($result as $row)
    {
        array_push($user,[$row['id'],$row['email'],$row['userrole']]);
    }
    echo json_encode($user);
}
else if (intval($_GET['type']) == 1)
{
    $dbHandler->manageAdminPriviliges(intval($_GET['q']));
}
else if (intval($_GET['type']) == 2)
{
    $dbHandler->deleteUser(intval($_GET['q']));
}


?>