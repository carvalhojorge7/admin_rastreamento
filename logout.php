<?php
session_start();

if (isset($_SESSION['token'])) {

  $token = $_SESSION['token'];
} else {
  header('Location: login.php');
}

$url = 'http://127.0.0.1:8000/api/auth/logout';

$ch = curl_init();

// Define as opções da requisição
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json',
  'Authorization: Bearer ' . $token
));
curl_setopt($ch, CURLOPT_HTTPGET, true);

$response = curl_exec($ch);

$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

session_destroy();
header('Location: login.php');
