<?php
require 'vendor/autoload.php';
require('./php/config-google.php');
require ('./php/db.php');

use GuzzleHttp\Client;

$client = new Client([
    'timeout'  => 2.0,
    'verify'   => __DIR__ . '/cacert.pem'
]);
try {

    $response = $client->request('GET', 'https://accounts.google.com/.well-known/openid-configuration');
    $discoveryJSON = json_decode((string)$response->getBody());
    $tokenEndpoint = $discoveryJSON->token_endpoint;
    $userinfoEndpoint = $discoveryJSON->userinfo_endpoint;
    $response = $client->request('POST', $tokenEndpoint, [
        'form_params' => [
            'code' => $_GET['code'],
            'client_id' => GOOGLE_ID,
            'client_secret' => GOOGLE_SECRET,
            'redirect_uri' => 'http://localhost:8000/conn-google.php',
            'grant_type' => 'authorization_code',
        ]
    ]);
    $accessToken = json_decode($response->getBody())->access_token;
    $response = $client->request('GET', $userinfoEndpoint, [
        'headers' => [
            'Authorization' => 'Bearer' . $accessToken
        ]
    ]);
    $response = json_decode($response->getBody());
    if ($response->email_verified === true) {
        session_start();
        $_SESSION["email"] = $response->email;
        $_SESSION["auth"] = 1;
        
        /*$response = $client->request('GET', , [
            'headers' => [
                'Authorization' => 'Bearer' . $accessToken
            ]
        ]);*/

        try {
            // Connexion à la BDD
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header("Location: ./client.php"); // TODO
        exit();
    }

} catch (GuzzleHttp\Exception\ClientException $exception) {
    dd($exception->getMessage());
}
dd((string)$response->getBody());