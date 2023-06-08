FROM php:5.6-apache
COPY . /var/www/html/
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN service apache2 restart
RUN docker-php-ext-install mysqli-5.6
EXPOSE 80