FROM php:8.2-apache

# Copia o conteúdo da sua subpasta para a raiz do servidor web
COPY ./trabalho01-WEB2/ /var/www/html/

RUN chown -R www-data:www-data /var/www/html