<?php
$client_id = '576332959951380';
    $client_secret ='1b6a14fd80801673716f30339904fe68';
        $redirect_uri = 'https://lisplib.github.io/test_Api_Instagram/';
    $code ='AQBnkPKHtPgD1qoMpWNljhqSeaPOIC9UIMG0hp5sBUNSEKq-QafQNNIvXDbVbtcakcLAx6MTtT1Qs7CH0FC6d6ix03TdVLfKAmXHjRtihEZQ1Eg_Rh1HB1F7da0ADP9J_1sg53_2C3ZifF8h36L8CzyBP102SLJuOkWcUuHbo-QDKqoFRUhnuztKLaO7uPEKFMipemkvlS-nRa1TXG1u6HSUTsL9vA6F-aN9gvrUdpir-g';

    $url = "https://api.instagram.com/oauth/access_token";
    $access_token_parameters = array(
        'client_id'                =>     $client_id,
        'client_secret'            =>     $client_secret,
        'grant_type'               =>     'authorization_code',
        'redirect_uri'             =>     $redirect_uri,
        'code'                     =>     $code
    );

$curl = curl_init($url);    // we init curl by passing the url
    curl_setopt($curl,CURLOPT_POST,true);   // to send a POST request
    curl_setopt($curl,CURLOPT_POSTFIELDS,$access_token_parameters);   // indicate the data to send
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   // to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);   // to stop cURL from verifying the peer's certificate.
    $result = curl_exec($curl);   // to perform the curl session
    curl_close($curl);   // to close the curl session

     var_dump($result);