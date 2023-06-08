FROM phpmyadmin:apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./my.cnf /etc/mysql/
RUN service apache2 restart
RUN systemctl start mysql
EXPOSE 80
