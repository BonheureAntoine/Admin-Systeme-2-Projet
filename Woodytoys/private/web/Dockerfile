FROM php:8.0-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli
RUN mkdir /var/log/apache2/php
COPY ./config/intranet.conf /etc/apache2/sites-available/
COPY ./sites/ /var/www/

RUN a2dissite 000-default.conf
RUN a2ensite intranet.conf