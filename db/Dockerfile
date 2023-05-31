FROM phpmyadmin:apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN sudo systemctl stop mysql
RUN sudo mysql_upgrade
RUN sudo systemctl start mysql
RUN service apache2 restart
EXPOSE 80
