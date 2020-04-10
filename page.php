<?php
use Facebook\Facebook;

require_once 'vendor/autoload.php';

$fb = new Facebook([
    'app_id' => '596355230967973',
    'app_secret' => '6d383edbce2edd715d2ff3d393414995',
    'default_graph_version' => 'v2.2',
]);

$fb->setDefaultAccessToken('EAAIeYcWzqKUBAE2oFcfyJHJQfh8TsIGWpz0JMGAHqXt21h1ssd3NrgS0UelCvwDJxKJZActq4bhPYOsnXilHWcFr84BPCLWKJ8oU35n0GDOIb0nEVhmGR76ng14LWq4E5EB0IyQ0ltlyc6vwQxDQW4gjiS8zJ9uaI8lBpVvJpm98QNNHe');



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
<div style="text-align:center; text-transform: uppercase; background: #242526; color: #e4e6eb; margin: 2%; padding: 2%; border-radius: 0.5rem; box-shadow: 1px 2px 10px black;">
  <h1 style="text-shadow: 1px 2px 10px black;">Les évènements</h1>
</div>
<?php
  foreach($allEvents as $events){
    $eventName = (empty($events['name'])) ? '' : $events['name'];
    $eventPlace = (empty($events['place']['name'])) ? '' : $events['place']['name'];
    $eventDescription = (empty($events['description'])) ? '' : $events['description'];
    $eventPicture = (empty($events['cover']['source'])) ? '' : $events['cover']['source'];
    $eventStartTime = (empty($events['start_time'])) ? '' : $events['start_time'];
    

    $eventStart = new DateTime($eventStartTime);
    $date = $eventStart->format('d-m-Y');
    $hour = $eventStart->format('H:i');
    ?>
    <div style="background: #242526; margin: 2%; border-radius: 0.5rem; text-align:center; padding: 2%; color: #e4e6eb;">
      <div style="background: #3a3b3c; margin: 2%; border-radius: 0.5rem; padding: 2%; box-shadow: 1px 2px 10px black;"> 
        <h2><?= $eventName ?></h2>
      </div>
      <div style="background: #3a3b3c; margin: 2%; border-radius: 0.5rem; padding: 2%; box-shadow: 1px 2px 10px black; font-size: 1.2em;">
        <h2>
          <?= $date ?> à partir de <?= $hour ?>
        </h2>
        <p>
          <?= $eventDescription ?>
        </p>
        
        <img style="border-radius: 0.5rem; box-shadow: 1px 2px 10px black; height: 500px; margin-top: 1%;" src="<?= $eventPicture ?>" alt="">
      </div>
    </div>
    <?php
}

