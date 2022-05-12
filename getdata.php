<?php

error_reporting(E_ERROR | E_PARSE);
session_start();
$name = $_SESSION['name'];
$code = $_SESSION['chatcode'];
$message = $_GET['message'];
if( $message!="" ) {
    if ($message !== "`") {
        $url = 'http://localhost:8080/messages/new';
        $data = array(
            'usernam' => $name,
            'chatcode' => $code,
            'content' => $message
        );
        $content = json_encode($data);
        function httpPost($url, $content)
        {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array("Content-type: application/json"));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
            curl_exec($curl);
            curl_close($curl);
        }

        httpPost($url, $content);
    }
    function httpGet($url, $content)
    {
        $curl = curl_init($url);
        $url = 'http://localhost:8080/messages/getchatcode?' . http_build_query($content);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }

    $content = array('chatcode' => $code);
    $result = httpGet($url, $content);
    $i = 0;
    $result = json_decode($result);
    while ($i < sizeof($result)) {
        echo "<p>" . $result[$i]->usernam . ": " . $result[$i]->content . "</p>";
        $i = $i + 1;
    }


}
?>



