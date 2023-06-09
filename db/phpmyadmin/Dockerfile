FROM phpmyadmin:apache

# Copiar archivos de configuración
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./my.cnf /etc/mysql/
COPY ./mysqld.cnf /etc/mysql/mysql.conf.d/

# Copiar archivo SQL para migración
#COPY ./cgic.sql /docker-entrypoint-initdb.d/
#COPY ./entrypoint.sh /docker-entrypoint-initdb.d/
#WORKDIR /script
#RUN ./entrypoint.sh
COPY ./entrypoint.sh /docker-entrypoint-initdb.d

EXPOSE 3306

CMD ["mysqld"]
# Reiniciar el servicio de Apache
RUN service apache2 restart

# Exponer el puerto 80 (puedes cambiarlo si es necesario)
EXPOSE 80
