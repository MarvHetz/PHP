<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketsystem</title>
    <link rel="icon" type="image/x-icon" href="../images/favico.ico">
    <link rel="stylesheet" href="TicketForm.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="jquery.js"></script>
    <script src="index.js"></script>
</head>
<body>

    <div class="logout">
        <a class='bx bx-log-out bx-fade-left-hover'  href="TicketForm.php?logout=true"></a>
    </div>
    <div class="Form">
        <form method="get">
            <div id="title">
                <h1>Ticket</h1 class="title">
            </div>
            <div class="shortDescription">
                <input type="text" name="shortdescription" placeholder="Short Description"/>
            </div>
            <div class="longDescription">
                <textarea placeholder="Long Description" name="longdescription" rows="10" cols="33"></textarea>
            </div>
            <div class="button">
                <input type="submit" id="submit" name="submit" value='Submit Ticket'>
            </div>
        </form>
    </div>
</body>
</html>

<?php
    session_start();
    include '../DBHandler.php';
    $dbHandler = new dbHandler();
    if (isset($_GET['submit']))
    {
        $dbHandler->addTicket($_SESSION['userid'],$_GET['shortdescription'],$_GET['longdescription']);
    }
    if (isset($_GET['logout']))
    {
        session_destroy();
        header('Location:../');
    }
?>