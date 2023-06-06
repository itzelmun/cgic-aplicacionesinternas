FROM phpmyadmin:apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN service apache2 restart
RUN docker-php-ext-install mysqli
EXPOSE 80
