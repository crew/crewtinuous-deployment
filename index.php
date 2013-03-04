<?php

if($_POST['payload'] != NULL){
  file_put_contents('access.log', $_POST['payload']."\r\n", FILE_APPEND);
}

?>
