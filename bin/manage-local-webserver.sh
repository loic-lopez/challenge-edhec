#!/usr/bin/env bash

function help {
    echo -e "\x1B[0;32mArtisan local webserver manager: List of available commands\x1B[0m"
    echo -n -e "\n"

    echo -e "\x1B[33mUsage:\x1B[0m"
    echo -e "\t$(basename $0) [COMMAND]"

    echo -n -e "\n"
    echo -e "\x1B[33mStart:\x1B[0m"
    echo -e "\x1B[0;32m  start: start local webserver running on port 80.\x1B[0m"

    echo -n -e "\n"
    echo -e "\x1B[33mStop:\x1B[0m"
    echo -e "\x1B[0;32m  stop: stop local webserver.\x1B[0m"
}

if [ "$1" == "start" ];
then
    sudo php ../artisan serve --host=0.0.0.0 --port=80 &

elif [ "$1" == "stop" ];
then
    sudo kill -9 $(sudo lsof -t -i:80 -sTCP:LISTEN)

elif [ "$1" == "help" ]
then
    help

else
    help

fi