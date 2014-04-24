<?php

/**
 * The path to the configuration file
 */
define("CONFIG_FILE", "config.yaml");

/**
 * Logs the given information to the access log
 * @param $log The information to log
 */
function add_to_accesslog($log){
  file_put_contents('access.log', $log."\r\n", FILE_APPEND);
}

/**
 * Parses the Configuration file and gets a list of repositories that this script should manage
 * @return mixed The List of repositories to manage and the details regarding them.
 */
function get_repositories(){
  return yaml_parse_file(CONFIG_FILE);
}