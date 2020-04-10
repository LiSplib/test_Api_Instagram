<?php

require_once 'vendor/autoload.php';

$fb = new \Facebook\Facebook([
    'app_id' => '596355230967973',
    'app_secret' => '6d383edbce2edd715d2ff3d393414995',
    'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email'];
$loginUrl = $helper->getLoginUrl('http://localhost/ApiInsta/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '" style="background:#2d88ff; color:white;"> Se Connecter avec Facebook </a>';