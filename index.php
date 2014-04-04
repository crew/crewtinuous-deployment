<?php
require('lib.php');

if (isset($_REQUEST['key']) && $_REQUEST['key'] == '<insert random key here>') {
  if(isset($_POST['payload'])){
    add_to_accesslog($_POST['payload']);
  
    # Decode that sucka!, since its just json
    $payload = json_decode($_POST['payload']);
  
    # Gets the name of the repository
    $reponame = $payload->repository->name;
  
    # Get all the repositories stored in the config file
    $repos = get_repositories();
    if(isset($repos[$reponame])){
  
      # Get the directory the repo is in 
      $repo = $repos[$reponame];
      $dir = $repo["directory"];
      $cmd = @$repo["deploy"];
  
      # Run the shell command
      $res = trim("git output: " . `(cd $dir && git fetch 2>&1 && git merge origin/master 2>&1)`) . "; ";
      if($cmd != NULL)
        $res .= trim("deploy output: " . `(cd $dir && $cmd)`) . "; ";
  
      # Log the git result into the git log.
      file_put_contents('git.log', "FOUND: $reponame; $res\r\n", FILE_APPEND);
    }
  }
}

?>
