FROM php:7.2-apache

RUN docker-php-ext-install mysqli

RUN chmod a+w /var/run/apache2

# Change Apache's port to 8000 so it does not need root
RUN echo "Listen 8000" > /etc/apache2/ports.conf
EXPOSE 8000

COPY index.php /var/www/html/

USER 1000
