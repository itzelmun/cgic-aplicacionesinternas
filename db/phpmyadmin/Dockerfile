FROM phpmyadmin:apache

# Copiar archivos de configuración
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite
RUN service apache2 restart

# Exponer el puerto 80 
EXPOSE 80