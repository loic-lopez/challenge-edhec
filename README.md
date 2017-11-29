# Challenge Epitech/Edhec


<img align="left" width="415" src="http://hdqwalls.com/wallpapers/laravel-to.jpg" hspace="20"/>
<img align="left" width="415" src="http://ryanjbaxter.com/wp-content/uploads/2015/12/docker-wallpaper-black.jpg" hspace="20"/>

## Installation

OS X & Linux:

### WARNING! When asked the root password for MySQL will be "root".

`./install/install.sh`

`cp .env.example .env`

`composer update`

`./bin/manage-local-webserver.sh import`


## Development

## Database Management
**Import database** `./bin/manage-mysql-container.sh import`

**Re import database** `./bin/manage-mysql-container.sh reimport`

## Local web server management
**Start web local server** `./bin/manage-local-webserver.sh start`

**Stop web local server** `./bin/manage-local-webserver.sh stop`

