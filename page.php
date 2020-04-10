<?php

use Facebook\Facebook;

require_once 'vendor/autoload.php';

$fb = new Facebook([
    'app_id' => '596355230967973',
    'app_secret' => '6d383edbce2edd715d2ff3d393414995',
    'default_graph_version' => 'v2.2',
]);

$fb->setDefaultAccessToken('EAAIeYcWzqKUBAF9s8kdMoPis5vBYauY7U9VNjSyN9X7XvNnpo4PAlx3F9VRQuA3h3uZBxjgY2zR438GpW3ygfw7a37k20pnELa1sctmtlVbPZASeW01nNXCOd7Cj8IVOzHmo4g4QZAIypuQN93pBXuLRg3waDFm5H5lEk4OOfPRamlhL0KTmemFkutYtWYd6EGHB6oKkVYbRaFdZAr0h');



try {
    // Requires the "read_stream" permission
    $response = $fb->get('/631254443954084?fields=events{cover,description,name,start_time,end_time}');
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
  }
  $allEvents = $response->getDecodedBody()['events']['data'];
  ?>
<div>
  <h1 style="text-align:center; text-transform: uppercase;">Les évènements</h1>
</div>
<?php
  foreach($allEvents as $events){
    $eventName = (empty($events['name'])) ? '' : $events['name'];
    $eventPlace = (empty($events['place']['name'])) ? '' : $events['place']['name'];
    $eventDescription = (empty($events['description'])) ? '' : $events['description'];
    $eventPicture = (empty($events['cover']['source'])) ? '' : $events['cover']['source'];
    $eventStartTime = (empty($events['start_time'])) ? '' : $events['start_time'];
    $eventStart = new DateTime($eventStartTime);
    // $eventStart->format('Y-m-d');
    // var_dump($eventStart); die();

    ?>
    <div style="background: grey; margin: 2%; border-radius: 0.5rem; text-align:center; padding: 2%;">
      <div> 
        <h2><?= $eventName ?></h2>
      </div>
      <div>
        <p>
          <?= $eventDescription ?>
        </p>
        <p>
          <?= $eventStartTime ?>
        </p>
        <img style="border-radius: 0.5rem; box-shadow: 1px 2px 10px black; height: 500px; margin-top: 1%;" src="<?= $eventPicture ?>" alt="">
      </div>
    </div>
    <?php
}

