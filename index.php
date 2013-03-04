<?php
require('lib.php');

if($_POST['payload'] != NULL){
  add_to_log($_POST['payload']);
}

?>
