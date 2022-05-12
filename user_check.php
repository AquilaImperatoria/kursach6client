<?php
session_start();
$url = 'http://localhost:8080/users/check';
$name = $_POST['name'];
$password = $_POST['password'];
$data = [
    'name'      => $name,
    'password' => $password
];
$response = httpPost($url, $data);
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
$message = "Ошибка при входе, возможно, вы ввели не тот пароль или еще не зарегистрировались?";
if ($response == '[]') {  $_SESSION['alerts'] = $message; header( "Location: http://localhost:81/index.php" );}
else {$name = $_POST['name'];
    $_SESSION['name'] = $name;header( "Location: http://localhost:81/choose.php" );}