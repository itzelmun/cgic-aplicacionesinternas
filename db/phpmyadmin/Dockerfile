FROM phpmyadmin:apache

# Copiar archivos de configuración
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
##COPY ./my.cnf /etc/mysql/
##COPY ./mysqld.cnf /etc/mysql/mysql.conf.d/

# Copiar el archivo cgic.sql a la ubicación /tmp/cgic.sql dentro del contenedor
COPY ./cgic.sql /docker-entrypoint-initdb.d/cgic.sql



# Ejecutar el comando para importar el archivo cgic.sql
#RUN service mysql start && mysql -uwcgic -p4TcCF --init-command="SET SESSION FOREIGN_KEY_CHECKS=0" < /docker-entrypoint-initdb.d/cgic.sql
#CMD ["sh", "-c", "exec mysql -uwcgic -p4TcCF --init-command=\"SET SESSION FOREIGN_KEY_CHECKS=0\" < /docker-entrypoint-initdb.d/cgic.sql"]
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
