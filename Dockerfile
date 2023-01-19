FROM php:7.4-cli

WORKDIR /app

COPY . /app

ENV PORT=8080

EXPOSE 8080

CMD [ "php", "/app/main/index.php" ]