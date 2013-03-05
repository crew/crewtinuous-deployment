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
    $repo = $repos[$reponame];
    $dir = $repo["directory"];
    $cmd = @$repo["deploy"];

    # Run the shell command
    $res = trim("git output: " . `(cd $dir && git pull 2>&1)`) . "; ";
    if($cmd != NULL)
      $res .= trim("deploy output: " . `(cd $dir && $cmd)`) . "; ";

    # Log the git result into the git log.
    file_put_contents('git.log', "FOUND: $reponame; $res\r\n", FILE_APPEND);
  }
}

?>
