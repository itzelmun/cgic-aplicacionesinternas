FROM php:5.6-apache
COPY . /var/www/html/
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./php.ini /usr/local/etc/php/php.ini
RUN a2enmod rewrite
#RUN docker-php-ext-install mysql
RUN service apache2 restart
RUN docker-php-ext-install mysqli
#CMD ["bash", "-c", "service apache2 restart && apachectl -k graceful"]

EXPOSE 80