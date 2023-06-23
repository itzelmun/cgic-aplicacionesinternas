FROM pretzlaw/php:5.3-fpm
COPY . /var/www/html/
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN docker-php-ext-install mysql
#RUN service apache2 restart
EXPOSE 80