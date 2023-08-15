FROM php:8.1-apache
COPY . /var/www/html/
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
#RUN docker-php-ext-install mysql
RUN service apache2 restart
#CMD ["bash", "-c", "service apache2 restart && apachectl -k graceful"]

EXPOSE 80