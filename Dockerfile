FROM php:8.0-apache
WORKDIR /var/www/html

COPY index.php index.php
COPY . .

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

EXPOSE 80