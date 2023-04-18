FROM php:7.3.12-fpm-stretch as builder

RUN apt-get update && \
    apt-get -y install libzip-dev unzip && \
    docker-php-ext-install zip
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY . /tmp/laravel
WORKDIR /tmp/laravel
RUN chown -R www-data .
USER www-data
RUN composer install

FROM php:7.3.12-fpm-stretch

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
       mysql-client \
       libmagickwand-dev \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install pdo_mysql

RUN mkdir -p /var/www/beginner-sqli
COPY --from=builder --chown=www-data /tmp/laravel /var/www/beginner-sqli/
WORKDIR /var/www/beginner-sqli
VOLUME /var/www/beginner-sqli

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

USER www-data
CMD ["/bin/sh", "-c", "./mysql_setup.bash && php-fpm"]
