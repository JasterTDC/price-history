FROM php:8-fpm

RUN apt update && apt install vim -y
RUN pecl install xdebug
RUN pecl install pcov
RUN docker-php-ext-install pdo_mysql
COPY rootfs/php/conf.d/* /usr/local/etc/php/conf.d/
