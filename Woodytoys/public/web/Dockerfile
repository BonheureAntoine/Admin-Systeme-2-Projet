# Image de base du server web 
# https://hub.docker.com/_/php
# Dans le section apache il y a plus d'explication sur cette image
# php:<version>-apache
FROM php:8.0-apache

# associer des commandes mysqli et sql dans l'image apache
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli
#RUN apt-get update && apt-get upgrade -y


#RUN apt-get -y update
#RUN apt-get install -y vim
#RUN apt-get install -y net-tools bind9 bind9utils dnsutils iputils-ping

#Créer des répertoires log pour les deux sites
RUN mkdir /var/log/apache2/html
RUN mkdir /var/log/apache2/php

#
RUN a2enmod ssl && a2enmod rewrite
RUN mkdir -p /etc/apache2/ssl
#RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

#Configuration apache et des virtual hosts
# Ajout des fichiers de configuration et des sites dans les dossiers adéquat 
COPY ./mysite/ /var/www/
COPY ./config/ports.conf /etc/apache2/
COPY ./config/apache2.conf /etc/apache2/
COPY ./config/sites/b2b.conf /etc/apache2/sites-available/
COPY ./config/sites/vitrine.conf /etc/apache2/sites-available/

#
COPY ./ssl/*.pem /etc/apache2/ssl/

#Configuration resolution de nom interne
COPY ./resolv.conf /etc/

# Désactivation du fichier de configuration du site par défaut
RUN a2dissite 000-default.conf
# Activation des fichiers de configuration des sites
RUN a2ensite vitrine.conf   
RUN a2ensite b2b.conf

#RUN apt-get -y install openssl
#RUN apt-get update -y && apt-get install -y nano vim
#RUN apt-get install -y dnsutils net-tools iputils-ping
#RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /usr/local/apache2/conf/server.key -out /usr/local/apache2/conf/server.crt -subj "/C=BE/ST=Braban-wallon/L=Louvain-La-Neuve/O=Ephec/OU=IT/CN=www.m1-4.ephec-ti.be"


EXPOSE 80
EXPOSE 443