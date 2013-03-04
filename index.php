<?php
require('lib.php');

if(@($_POST['payload'] != NULL)){
  add_to_accesslog($_POST['payload']);

  # Decode that sucka!, since its just json
  $payload = json_decode($_POST['payload']);

  # Gets the name of the repository
  $reponame = $payload->repository;
  $reponame = $reponame->name;

  # Get all the repositories stored in the config file
  $repos = get_repositories();
  if($repos[$reponame] != NULL){

    # Get the directory the repo is in 
    $dir = $repos[$reponame];
    # Run the shell command
    $res = `cd $dir && git pull`;

    # Log the git result into the git log.
    file_put_contents('git.log', "FOUND $reponame: $res\r\n", FILE_APPEND);
  }
}

?>
