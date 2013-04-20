#Crewtinuous Deployment

This projected is a deployment system for crew. It hooks into githubs WebHook Service Hooks. Configure a webserver to host this repo
then point the Service Hook at that URL.

## Installation

Note: This installation is for Ubuntu 12.04, you may need to find the relevant packages for your own OS.

```
make
make install
```
There are a bunch of dependencies that this uses, mainly php-yaml. ```make install``` will take care of those.


##Setup

The config.yaml file as documentation on the configuration format. One entry for repository.

###Example config.yaml
If you have a website located in /var/www/ and the repository name on github is called "website", config.yaml should look like this:
```
website:
  directory: /var/www
```
