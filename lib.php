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
 * The Global parsed yaml file cached on every request
 */
$config_file = false;

function get_config_file() {
    global $config_file;
    if ($config_file) {
        return $config_file;
    } else {
        return $config_file = yaml_parse_file(CONFIG_FILE);
    }
}
/**
 * Parses the Configuration file and gets a list of repositories that this script should manage
 * @return mixed The List of repositories to manage and the details regarding them.
 */
function get_repositories(){
    return get_config_file()['repositories'];
}

/**
 * Returns the API Key for a given Repository or the entire script
 */
function get_api_key() {
    return get_config_file()['access-key'];
}