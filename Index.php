<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketsystem</title>
    <link rel="icon" type="image/x-icon" href="Images/favico.ico">
    <link rel="stylesheet" href="index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="jquery.js"></script>
    <script src="index.js"></script>
</head>
<body>
    <div  class="login">
        <form method="POST">
            <h1>Login</h1 class="title">
            <div class="email">
                <input type="email" id="emailfield" name="email" placeholder="E-Mail" onkeyup="inputcheck()" autocomplete="off"/>
                <i class='bx bx-envelope'></i>
            </div>
            <div class="password">
                <input type="password" id="passwordfield" placeholder="Password" name="password" onkeyup="inputcheck()"/>
                <i class='bx bxs-ghost' onclick="showpassword()" id="ghost"></i>
            </div>
            <div class="button">
                <input type="submit" id="submit" name="submit" disabled value='login'>
            </div>
            <div class="href">
                <a href="http://localhost/PHP/registration/registration.php">I don't have an account!</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
    include 'DBHandler.php';
    $dbHandler = new dbHandler();
    if (isset($_POST['submit']))
    {
        if(($userid = $dbHandler->validateLogin($_POST['email'], $_POST['password'])))
        {
            session_start();
            $_SESSION['userid'] = $userid;
            if($dbHandler->userIsAdmin($userid))
            {
                header('Location:AdminPanel/Adminpanel.php');
                exit;
            }
            else
            {
                header('Location:TicketForm/TicketForm.php');
                exit;
            }
        }
        else
        {
            header('Location:AdditionalPages/FalseLogin.html');
            exit;
        }
    }
?>