# Makefile for crewtinuous deployment. The only real thing this does is touch a log file and set permissions

default:
	@touch access.log
	@sudo chown -R :www-data ./*

