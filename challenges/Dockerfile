FROM php:7.3.12-fpm-stretch

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
       mysql-client \
    && docker-php-ext-install pdo_mysql

RUN mkdir -p /var/www/beginner-sqli
COPY . /var/www/challenges/
WORKDIR /var/www/challenges
VOLUME /var/www/challenges
