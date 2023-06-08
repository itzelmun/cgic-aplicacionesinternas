FROM phpmyadmin:apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./my.cnf /etc/mysql/
COPY ./cgic.sql /docker-entrypoint-initdb.d/
RUN service apache2 restart
EXPOSE 80
