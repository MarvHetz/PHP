<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketsystem</title>
    <link rel="icon" type="image/x-icon" href="../Images/favico.ico">
    <link rel="stylesheet" href="UserOverview.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../jquery.js"></script>
    <script src="UserOverview.js"></script>
</head>
<body>
<div class="logout">
    <a class='bx bx-log-out bx-fade-left-hover'  href="UserOverview.php?logout=true"></a>
</div>
<div id="Users">
    <table>
        <th>UserID</th>
        <th>E-Mail</th>
        <th>Adminpriviliges</th>
        <th>Delete User</th>
    </table>
</div>
</body>
</html>

<?php
session_start();
if (isset($_GET['logout']))
{
    session_destroy();
    header('Location:../');
    exit;
}
?>