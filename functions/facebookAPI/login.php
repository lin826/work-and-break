<?php
session_start();
require_once 'src/php-graph-sdk-5.0.0/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1682938868641175', // Replace {app-id} with your app id
  'app_secret' => 'a2f6cdf0db410f09d9d023d8591bd132',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['public_profile,email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/Timer_12_02/functions/facebookAPI/fb-callback.php', $permissions);

// $fb->setDefaultAccessToken('user-access-token');
// Get the name of the logged in user
// $requestUserName = $fb->request('GET', '/me?fields=id,name');

?>
