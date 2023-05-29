FROM phpmyadmin:apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
ENV PMA_HOST=cgic
ENV MYSQL_ROOT_PASSWORD=4TcCF
RUN service apache2 restart
EXPOSE 80
