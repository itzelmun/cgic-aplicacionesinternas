FROM php:5.6.2-apache

COPY . /var/www/html/
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN docker-php-ext-install mysqli
RUN service apache2 restart
EXPOSE 80

