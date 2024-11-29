FROM php:8.1-apache
COPY app/ /var/www/html/
RUN mkdir -p /var/www/html/musica
RUN chmod -R 755 /var/www/html/musica

