FROM composer:latest

RUN addgroup -g 1000 43php && adduser -G 43php -g 43php -s /bin/sh -D 43php

USER 43php

WORKDIR /var/www/html

ENTRYPOINT [ "composer", "--ignore-platform-reqs" ]
