FROM php:8.2-fpm-bullseye

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
       default-mysql-client \
    && docker-php-ext-install pdo_mysql

RUN mkdir -p /var/www/beginner-sqli
COPY . /var/www/challenges/
WORKDIR /var/www/challenges
VOLUME /var/www/challenges

RUN apt-get clean && rm -rf /var/lib/apt/lists/*
