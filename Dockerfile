FROM php:5.6-apache

Copy php.ini /usr/local/etc/php/

RUN docker-php-ext-install pdo_mysql

RUN  apt-get update && apt-get install -y libjpeg62-turbo-dev libpng12-dev libmcrypt-dev mysql-client curl\
&& docker-php-ext-install mysqli gd iconv \
&& docker-php-ext-install mbstring \
&& docker-php-ext-install mcrypt

COPY ./ /var/www/html/
EXPOSE 80