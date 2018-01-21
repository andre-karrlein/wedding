FROM php:7.2-fpm

RUN \
    apt-get update && \
    rm -rf /var/lib/apt/lists/*
RUN cd /var/www/code && ./composer.phar install
