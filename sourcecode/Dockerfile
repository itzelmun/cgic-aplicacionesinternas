FROM php:5.3-apache
COPY . /var/www/html/
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
#RUN a2enmod rewrite

RUN a2enmod rewrite \
    && apt-get update \
    && apt-get install -y libmysqlclient-dev \
    && docker-php-ext-install mysql

#RUN docker-php-ext-install mysqlnd
#RUN docker-php-ext-install mysql 
#RUN docker-php-ext-enable mysql
RUN service apache2 restart
EXPOSE 80