#!/usr/bin/env bash

sudo apt-get update
sudo apt-get install php7.0-cli php7.0-mysql php7.0-zip php7.0-mbstring php7.0-curl php7.0-xml php7.0-intl composer

sudo apt-get install \
     apt-transport-https \
     ca-certificates \
     curl \
     gnupg2 \
     software-properties-common

curl -fsSL https://download.docker.com/linux/$(. /etc/os-release; echo "$ID")/gpg | sudo apt-key add -
sudo add-apt-repository \
   "deb [arch=amd64] https://download.docker.com/linux/$(. /etc/os-release; echo "$ID") \
   $(lsb_release -cs) \
   stable"

sudo apt-get update
sudo apt-get install docker-ce