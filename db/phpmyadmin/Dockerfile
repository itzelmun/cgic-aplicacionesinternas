FROM phpmyadmin:apache

# Copiar archivos de configuración
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./my.cnf /etc/mysql/
COPY ./mysqld.cnf /etc/mysql/mysql.conf.d/

# Copiar archivo SQL para migración
COPY ./cgic.sql /docker-entrypoint-initdb.d/

# Variables de entorno para configurar la base de datos
#ENV MYSQL_DATABASE=nombre_de_la_base_de_datos
#ENV MYSQL_USER=usuario
#ENV MYSQL_PASSWORD=contrasena
#ENV MYSQL_ROOT_PASSWORD=root_contrasena

#ENV nombre_host=$_ENV['DB_HOST']
#ENV usuario_bd=$_ENV['MYSQL_USER']
#ENV contrasena_bd=$_ENV['MYSQL_PASSWORD']
#ENV base_datos_nombre=$_ENV['MYSQL_DATABASE']
# Comando para ejecutar el dump.sql al iniciar el contenedor
#CMD ["mysqld"]

#Ejecuta script para dumpeo
#COPY point.sh /script/
#WORKDIR /script
#CMD ["/bin/sh", "./point.sh"]

# Reiniciar el servicio de Apache
RUN service apache2 restart

# Exponer el puerto 80 (puedes cambiarlo si es necesario)
EXPOSE 80
