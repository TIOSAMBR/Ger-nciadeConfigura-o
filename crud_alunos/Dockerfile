FROM php:8.2-apache
RUN apt-get update
RUN rm /etc/apt/preferences.d/no-debian-php
RUN apt-get install -y php-mysql
#RUN service apache2 restart
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
COPY ./src /var/www/html
