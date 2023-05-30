FROM php:8.1-apache
COPY . /var/www/html/
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
#RUN docker-php-ext-install mysqli
RUN a2enmod rewrite
RUN service apache2 restart
EXPOSE 80