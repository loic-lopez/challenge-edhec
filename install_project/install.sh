#!/usr/bin/env bash

sudo apt-get update
sudo apt-get install php7.0-cli php7.0-mysql php7.0-zip php7.0-mbstring php7.0-curl php7.0-xml php7.0-intl

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

sudo apt-get remove --purge composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/usr/bin
php -r "unlink('composer-setup.php');"


echo -e "\x1B[31mYou must run:\x1B[0m"
echo -e "\x1B[33msudo gpasswd -a $USER docker:\x1B[0m"
echo -e "\x1B[33mnewgrp docker\x1B[0m"