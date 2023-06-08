FROM phpmyadmin:apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY /etc/mysql/my.cnf /etc/mysql/
RUN service apache2 restart
RUN docker-php-ext-install mysqli-5.6
EXPOSE 80
