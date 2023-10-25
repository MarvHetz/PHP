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
    <script src="../jquery.js"></script>
    <script src="TicketForm.js"></script>
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
                <input type="text" id="shortdesc" name="shortdescription" placeholder="Short Description"  onkeyup="checkInput()"/>
            </div>
            <div class="longDescription">
                <textarea placeholder="Long Description" name="longdescription" rows="10" cols="33"></textarea>
            </div>
            <div class="button">
                <input type="submit" id="submit" name="submit" value='Submit Ticket' disabled/>
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
        
        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => "https://send-mail-serverless.p.rapidapi.com/send",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'personalizations' => [
                [
                    'to' => [
                        [
                            'email' => 'hetzermarvin@dv-schulen.de',
                            'name' => 'Recipient name'
                        ]
                    ]
                ]
            ],
            'from' => [
                'email' => 'ticketsystem@firebese.com',
                'name' => 'Ticketsystem'
                ],
                'subject' => 'New Ticket',
                'content' => [
                    [
                        'type' => 'text',
                        'value' => 'There is a new Problem: '.$_GET['shortdescription']
                    ]
                ],
                'headers' => [
                    'List-Unsubscribe' => '<mailto: unsubscribe@firebese.com?subject=unsubscribe>, <https://firebese.com/unsubscribe/id>'
                ]
            ]),
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "X-RapidAPI-Host: send-mail-serverless.p.rapidapi.com",
                "X-RapidAPI-Key: d022f59bbcmshbdb2050bb644e38p1a472bjsn516f5d6c4f06",
                "content-type: application/json"
            ],
        ]); 

        curl_close($curl);
    }

    if (isset($_GET['logout']))
    {
        session_destroy();
        header('Location:../');
    }
?>