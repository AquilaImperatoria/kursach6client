<?php
session_start();
$name = $_SESSION['name'];
var_dump($name);
$url = 'http://localhost:8080/newchat';
$data = [
    'usernam'      => $name
];

function httpPost($url, $data)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    var_dump($response);
    return $response;
}
$_SESSION['chatcode'] = httpPost($url, $data);
header( "Location: http://localhost:81/chat.php" );
?>