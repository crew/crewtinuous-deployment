<?php

if($_POST['payload'] != NULL){
  file_put_contents('access.log', json_encode($_POST['payload'])."\r\n", FILE_APPEND);
}

?>
