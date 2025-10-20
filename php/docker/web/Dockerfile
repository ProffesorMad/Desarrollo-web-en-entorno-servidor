# Versión 1: Usa la imagen oficial de PHP con Apache
FROM php:8.4-apache

# Versión 2: Instala y activa Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Versión 3: Configura Apache para mostrar listados de archivos (+Indexes)
RUN echo "<Directory /var/www/html/>" >> /etc/apache2/apache2.conf \
    && echo "Options +Indexes" >> /etc/apache2/apache2.conf \
    && echo "</Directory>" >> /etc/apache2/apache2.conf

# Exponer el puerto 80
EXPOSE 80
