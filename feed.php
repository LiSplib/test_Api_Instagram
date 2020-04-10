<?php

use Facebook\Facebook;

require_once 'vendor/autoload.php';

$fb = new Facebook([
    'app_id' => '596355230967973',
    'app_secret' => '6d383edbce2edd715d2ff3d393414995',
    'default_graph_version' => 'v2.2',
]);

$fb->setDefaultAccessToken('EAAIeYcWzqKUBAIZAhZAt3s7B34aqR2bja9eImXkRbHkIjIkoVuvwyveyWmI7iipyMWdVuBETty0EhgA7EIrSMSpTtG8IUraDPkgRmIdkcdjxV5kbgVia7NZBZBy5BJrmTI9GZCoCPnujm9AsU1AZCaGtNkwWpwbepYDEHkxEf6LGwVxpO3H8nK');


try {
    // Requires the "read_stream" permission
    $response = $fb->get('/me/feed?fields=id,message,full_picture');
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  
  // Page 1
  $feedEdge = $response->getGraphEdge();
  
  foreach ($feedEdge as $status) {
    $postPicture = (empty($status->asArray()['full_picture'])) ? '' : $status->asArray()['full_picture'];
    $postMessage = (empty($status->asArray()['message'])) ? '' : $status->asArray()['message'];
    // var_dump($status->asArray());
?>
<p><?= $postMessage ?></p>
<img src="<?= $postPicture ?>" style="width: 500px;" alt="">
<?php

  }
  
//   Page 2 (next 5 results)
    // $nextFeed = $fb->next($feedEdge);
    // var_dump($nextFeed);
    // die();
