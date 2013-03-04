# Makefile for crewtinuous deployment. The only real thing this does is touch a log file and set permissions

default:
	@touch access.log
	@touch git.log
	@sudo chown :www-data *.log
	@chmod 775 *.log

reset:
	@rm *.log
	@make default

packages:
	@sudo apt-get install libyaml-dev php-pear php5-dev
	@sudo pecl install yaml
	@echo "MAKE SURE TO ADD 'extension=yaml.so' TO YOUR PHP.INI FILE!"
