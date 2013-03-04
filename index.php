<?php
require('lib.php');

if($_POST['payload'] != NULL){
  add_to_log($_POST['payload']);

  # Decode that sucka!, since its just json
  $payload = json_decode($_POST['payload']);

  # Gets the name of the repository
  $repo = $payload['repository']['name'];
}

?>
