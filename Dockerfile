# Imagen de PHP con Apache
FROM php:8.1-apache

# Archivos de la aplicación copiados al contenedor
COPY ./src /var/www/html

# Puerto
EXPOSE 80