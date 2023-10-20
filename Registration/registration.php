<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticketsystem</title>
    <link rel="icon" type="image/x-icon" href="../Images/favico.ico">
    <link rel="stylesheet" href="registration.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../jquery.js"></script>
    <script src="registration.js"></script>
</head>
<body>
    <div class="login">
        <form method="post">
            <h1>Registration</h1 class="title">
            <div class="email">
                <input type="email" name="email" id='emailfield' onkeyup="checkpasswords()" placeholder="E-Mail" autocomplete="off" />
                <i class='bx bx-envelope'></i>
            </div>
            <div class="passworddiv" id="password">
                <input type="password" placeholder="Password" onkeyup="checkpasswords()" id="passwordfield"/>
                <i class='bx bxs-ghost' id="ghost" onclick="showpassword()"></i>
            </div>
            <div class="passworddiv" id="password2">
                <input type="password" placeholder="Repeat Password" onkeyup="checkpasswords()" id="passwordfield2"/>
                <i class='bx bxs-ghost' id="ghost2" onclick="showpassword()"></i>
            </div>
            <div class="button">
                <input type="submit" name="submit" id="submit" disabled value='register'>
            </div>
            <div class="href">
                <a href="http://localhost/PHP">I already have an account!</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php
include '../DBHandler.php';
    $dbHandler = new dbHandler();
    if (isset($_POST['submit']))
    {
        if($dbHandler->checkForEmail($_POST['email']))
        {
            header('Location:../AdditionalPages/SucceededRegistration.html');
            exit;
        }
        else
        {
            header('Location:../AdditionalPages/DuplicateEmail.html');
            exit;
        }
    }
?>