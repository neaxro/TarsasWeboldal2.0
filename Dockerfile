FROM php:8.0-apache
WORKDIR /var/www/html
COPY index.php index.php
COPY res/ res/
RUN mkdir -p /res/indexkepek
ENV UPLOAD_MAX_FILESIZE=64M
RUN chmod -R 777 /var/www/html/res/indexkepek

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

EXPOSE 80