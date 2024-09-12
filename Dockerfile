FROM php:8.1-apache

RUN docker-php-ext-install pdo mysqli

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80