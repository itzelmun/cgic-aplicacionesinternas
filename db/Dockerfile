FROM phpmyadmin:apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN service mysql restart
RUN service apache2 restart

EXPOSE 80
