#!/bin/bash
docker stop lili-fw 2> /dev/null;

if [[ "$(docker images -q lili-fw:dev 2> /dev/null)" == "" ]]; then
  docker build -t lili-fw:dev .
fi

docker run --net=host -d --rm --name lili-fw \
    -v "$PWD:/var/www/Website/api" \
    -p "80:80" \
    lili-fw:dev