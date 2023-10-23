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

    $column = $dbHandler->getUserEmailByTicketId(intval($_GET['q']));
    $email = null;

    //I know there is only one Column but if I don't use this foreach there is an offset error if I try to use the value of each key
    foreach ($column as $row)
    {
        $email = $row['email'];
        $id = $row['id'];
        $shortDescription = $row['shortdescription'];
    }

    echo $email;

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
                            'email' => $email,
                            'name' => 'Recipient name'
                        ]
                    ]
                ]
            ],
            'from' => [
                'email' => 'ticketsystem@firebese.com',
                'name' => 'Ticketsystem'
            ],
            'subject' => 'Your Ticket with the ID was Sovled:'. $id,
            'content' => [
                [
                    'type' => 'text',
                    'value' => 'We solved your Problem: '.$shortDescription
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

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}
?>