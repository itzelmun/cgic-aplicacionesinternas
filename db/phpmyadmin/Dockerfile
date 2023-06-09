FROM phpmyadmin:apache

# Copiar archivos de configuración
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./my.cnf /etc/mysql/
COPY ./mysqld.cnf /etc/mysql/mysql.conf.d/

# Copiar archivo SQL para migración
#COPY ./cgic.sql /docker-entrypoint-initdb.d/

# Reiniciar el servicio de Apache
RUN service apache2 restart

# Exponer el puerto 80 (puedes cambiarlo si es necesario)
EXPOSE 80
