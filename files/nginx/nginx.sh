#!/bin/bash

installed=$(dpkg -l | grep nginx | grep 1.8 | wc -l)

if [ $installed -eq 0 ]; then
		sudo -s
		nginx=stable
		add-apt-repository ppa:nginx/$nginx
		apt-get update
		apt-get install -q -y nginx
fi