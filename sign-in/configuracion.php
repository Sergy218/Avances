<?php
  require_once 'vendor/autoload.php';

  $clientID = '512415427449-id8s5co8ud1hr2aeervrhfe0q33vuavv.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/apps/h3/sidebars/index.php';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");

  //var_dump($client);
  // Crear un objeto Google_Service_Oauth2 para obtener información del usuario
$oauth2Service = new Google_Service_Oauth2($client);

// Verificar si se está realizando una autenticación o se está mostrando el formulario
if (isset($_GET['code'])) {
    // Si se ha recibido un código de autorización, procesarlo
    $client->authenticate($_GET['code']);
    $token = $client->getAccessToken();

    // Utilizar el token para obtener información del usuario
    $userInfo = $oauth2Service->userinfo->get();
    $userId = $userInfo->id;
    $userEmail = $userInfo->email;
    $userName = $userInfo->name;

    // Realizar acciones con la información del usuario (por ejemplo, registrar al usuario en tu aplicación)

    // Redirigir a la página de inicio de sesión o a donde sea necesario
    header('http://localhost/apps/h3/sidebars/index.php');
    exit;
} else {
    // Si no se ha recibido un código de autorización, redirigir al usuario para autenticarse
    $authUrl = $client->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    exit;
}
?>