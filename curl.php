<?php
$client_id = '576332959951380';
    $client_secret ='1b6a14fd80801673716f30339904fe68';
        $redirect_uri = 'https://lisplib.github.io/test_Api_Instagram/';
    $code ='AQBRRQvAGwEV0Mx41dBeVugICGMDw9P-W_PMatIk8Qoj0imlP18RMrijfBE1yB9SbZ9v1qVpLQOIKumTmqD9NvVW3Qejdljy6imE_LsEf-Ki1Lpwo1ZkddRdCNti8-sQV-vsrGIK-7GqqSAP8UrtkUChpf_A4GFJj9rmC-e51lKy8Aj-BYluxdLpyZBwTCYUQ-_raaPb7s2qAJiAARcfsgazubCOTWjPZq86OBsyrq59cw';

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