<?php

// Account details
$apiKey = urlencode('RJYClXWjNjs-5f6V7RyAWZGcGVMzWbWdwdFEd5IjZ');

// Message details
$numbers = $_REQUEST['phone'];
$sender = urlencode('TXTLCL');
$message = "Your subscription is going to end! Please renew the service.";

// Prepare data for POST request
$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

// Send the POST request with cURL
$ch = curl_init('https://api.textlocal.in/send/');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

//echo $response;
