# Makefile for crewtinuous deployment. The only real thing this does is touch a log file and set permissions

default:
	@touch access.log
	@touch git.log
	@sudo chown :www-data *.log
	@chmod 775 *.log

reset:
	@rm *.log
	@make default
