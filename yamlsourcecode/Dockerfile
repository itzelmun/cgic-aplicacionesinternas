FROM php:5.6.2-apache

COPY . /var/www/html/

RUN a2enmod rewrite
RUN docker-php-ext-install mysqli

RUN service apache2 restart

EXPOSE 80
