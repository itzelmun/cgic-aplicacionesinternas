FROM php:5.4-apache
COPY . /var/www/html/
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
#RUN a2enmod rewrite
RUN docker-php-ext-install mysql mysqli pdo pdo_mysql
#RUN docker-php-ext-install mysqlnd
#RUN docker-php-ext-install mysql 
#RUN docker-php-ext-enable mysql
RUN service apache2 restart
EXPOSE 80