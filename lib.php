<?php

# Constant configuration file location
define("CONFIG_FILE", "config.yaml");

# Throws this into the access.log file
function add_to_accesslog($log){
  file_put_contents('access.log', $log."\r\n", FILE_APPEND);
}

# Get the local repositories on this instance
function get_repositories(){
  return yaml_parse_file(CONFIG_FILE);
}

?>
