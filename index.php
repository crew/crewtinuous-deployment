<?php

file_put_contents('access.log', json_encode($_POST)."\r\n", FILE_APPEND);

?>
