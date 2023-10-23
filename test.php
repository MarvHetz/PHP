<?php

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
        'subject' => 'Example subject',
        'content' => [
            [
                'type' => 'text/html',
                'value' => 'Hello world <b>Html</b>'
            ],
            [
                'type' => 'text/plan',
                'value' => 'Hello world Text'
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