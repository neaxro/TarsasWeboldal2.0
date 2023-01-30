FROM php:8.1.0-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
CMD [ "php", "./main/index.php" ]