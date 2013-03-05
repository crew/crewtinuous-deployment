# Makefile for crewtinuous deployment. The only real thing this does is touch a log file and set permissions

default: setup

setup: clean
	touch access.log
	touch git.log
	@chown :www-data *.log

clean:
	rm -f *.log

packages:
	@apt-get install libyaml-dev php-pear php5-dev
	@pecl install yaml
	@echo "installed yaml php deps"
	@echo "MAKE SURE TO ADD 'extension=yaml.so' TO YOUR PHP.INI FILE!"

install: packages setup
