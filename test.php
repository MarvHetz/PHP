<?php
    $pdo = new PDO('mysql:host=localhost;dbname=ticketsystem','root','');
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $result = $pdo->query("Select password from users where email='$email';");
    $password_DB = $result->fetchColumn();

    if (password_verify($password,$password_DB))
    {
        echo 'ja';
    }
    else
        echo 'nein';