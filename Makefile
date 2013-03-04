# Makefile for crewtinuous deployment. The only real thing this does is touch a log file and set permissions

default:
	@touch access.log
	@sudo chown :www-data access.log
	@chmod 775 access.log

reset:
	@echo "" > access.log
