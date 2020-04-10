<?php

require_once 'vendor/autoload.php';
use Intervention\Image\ImageManager;

$manager = new ImageManager();

$fb = new \Facebook\Facebook([
  'app_id' => '596355230967973',
  'app_secret' => '6d383edbce2edd715d2ff3d393414995',
  'default_graph_version' => 'v2.2',
]);

$fb->setDefaultAccessToken('EAAIeYcWzqKUBAIZAhZAt3s7B34aqR2bja9eImXkRbHkIjIkoVuvwyveyWmI7iipyMWdVuBETty0EhgA7EIrSMSpTtG8IUraDPkgRmIdkcdjxV5kbgVia7NZBZBy5BJrmTI9GZCoCPnujm9AsU1AZCaGtNkwWpwbepYDEHkxEf6LGwVxpO3H8nK');

$requestUserName = $fb->request('GET', '/me?fields=id,name');
$requestUserLikes = $fb->request('GET', '/me/likes?fields=id,name&amp;limit=1');
$requestUserEvents = $fb->request('GET', '/me/events?fields=id,name&amp;limit=2');
$requestUserPhotos = $fb->request('GET', '/me/photos?fields=id,source,name&amp');


try{
  $response = $fb->sendRequest('GET', '/me/photos?fields=id,source,name&limit=100'); 
}catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$photos = $response->getDecodedBody()['data'];
$paging = $response->getDecodedBody()['paging'];
// var_dump($paging['cursors']); die();
$pagingCursors = $paging['cursors'];
$pagingNext = $paging['next'];
$pagingPrevious = (empty($paging['previous'])) ? '' : $paging['previous'];
?>
<div>
    <a href="" class="btn btn-info">&lt;</a>
    <a href="<?= $pagingCursors['after'] ?>" class="btn btn-info">&gt;</a>
</div>
<?php
foreach ($photos as $photo){
  $photoSrc = $photo['source'];
  $photoName = (empty($photo['name'])) ? '' : $photo['name'];
  ?>
  <img style="height: 500px;" src="<?= $photoSrc ?>" alt="<?= $photoName ?>">
  <?php
}

// var_dump($photos);