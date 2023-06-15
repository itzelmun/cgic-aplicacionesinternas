FROM phpmyadmin:apache

# Copiar archivos de configuración
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
##COPY ./my.cnf /etc/mysql/
##COPY ./mysqld.cnf /etc/mysql/mysql.conf.d/

# Copiar el archivo cgic.sql a la ubicación /tmp/cgic.sql dentro del contenedor
#COPY ./cgic.sql /docker-entrypoint-initdb.d/cgic.sql
COPY ./cgic.sql /docker-entrypoint-initdb.d/
RUN apt-get update && apt-get install -y mysql-client
RUN apt-get install -y dash
# Ejecutar el comando para importar el archivo cgic.sql
#RUN service mysql start && mysql -uwcgic -p4TcCF --init-command="SET SESSION FOREIGN_KEY_CHECKS=0" < /docker-entrypoint-initdb.d/cgic.sql
#CMD ["sh", "-c", "exec mysql -uwcgic -p4TcCF --init-command=\"SET SESSION FOREIGN_KEY_CHECKS=0\" < /docker-entrypoint-initdb.d/cgic.sql"]
# Variables de entorno para configurar la base de datos
#ENV nombre_host=$_ENV['DB_HOST']
#ENV usuario_bd=$_ENV['MYSQL_USER']
#ENV contrasena_bd=$_ENV['MYSQL_PASSWORD']
#ENV base_datos_nombre=$_ENV['MYSQL_DATABASE']

# Definimos las variables de entorno para configurar la base de datos
ENV DB_HOST=localhost
ENV db_port=3306
ENV MYSQL_ROOT_PASSWORD=rootpassword
ENV MYSQL_DATABASE=cgic
ENV MYSQL_USER=wcgic
ENV MYSQL_PASSWORD=4TcCF

# Ejecuta el comando para importar el archivo cgic.sql
RUN mysql -h "$B_HOST" -P "$db_port" -u "$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE" < /docker-entrypoint-initdb.d/cgic.sql

# Opcional: si deseas utilizar un archivo de configuración personalizado, puedes copiarlo dentro del contenedor
# COPY my.cnf /etc/mysql/conf.d/my.cnf

#Ejecuta script para dumpeo
#COPY point.sh /script/
#WORKDIR /script
#CMD ["/bin/sh", "./point.sh"]

# Exponer el puerto 80 (puedes cambiarlo si es necesario)
EXPOSE 80

# Iniciamos el contenedor ejecutando el script de inicialización de MySQL
# Esto creará las tablas y cargará los datos desde el archivo tu_basededatos.sql, ejecuta el dump.sql al iniciar el contenedor
CMD ["mysqld"]