<?php

# Throws this into the access.log file
function add_to_log($log){
  file_put_contents('access.log', $log."\r\n", FILE_APPEND);
}

?>
