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

COPY ./ssl/ca_bundle.crt /etc/apache2/ssl/ca_bundle.crt
COPY ./ssl/certificate.crt /etc/apache2/ssl/certificate.crt
COPY ./ssl/private.key /etc/apache2/ssl/private.key


#Configuration apache et des virtual hosts
# Ajout des fichiers de configuration et des sites dans les dossiers adéquat 
COPY ./mysite/ /var/www/
COPY ./config/ports.conf /etc/apache2/
COPY ./config/apache2.conf /etc/apache2/
COPY ./config/sites/b2b.conf /etc/apache2/sites-available/
COPY ./config/sites/vitrine.conf /etc/apache2/sites-available/

#
#COPY ./ssll/*.pem /etc/apache2/ssl/

#Configuration resolution de nom interne
COPY ./resolv.conf /etc/


# Désactivation du fichier de configuration du site par défaut
RUN a2dissite 000-default.conf
# Activation des fichiers de configuration des sites
RUN a2ensite vitrine.conf   
RUN a2ensite b2b.conf

RUN a2enmod ssl
RUN a2enmod rewrite

EXPOSE 80
EXPOSE 443