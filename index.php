<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://graph.instagram.com/me/media?fields=media_url&access_token=IGQVJVV3ptU2kyY0N4VkNnS3hfMXV5WUM4MV9oY3czNXZAKUi00ZAWpsOGpRWF9id3JqY1p3d3FVRDdFWUl3c2g0SW9Rd3hyWjFUaE5OMkdvb204X0Jvb1FMVXhxYjkzTmtJczhzelNza3ZAtU1IzbU9VYU9udWt5SGpyYmxv",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}