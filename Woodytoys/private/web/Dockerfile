# Image de base du server web
# https://hub.docker.com/_/php
# Dans le section apache il y a plus d'explication sur cette image
# php:<version>-apache
FROM php:8.0-apache

# associer des commandes mysqli et sql dans l'image apache
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

#Création du répertoire log 
RUN mkdir /var/log/apache2/php

# Ajout des fichiers de configuration et du sites dans les dossiers adéquat 
COPY ./config/intranet.conf /etc/apache2/sites-available/
COPY ./sites/ /var/www/

# Désactivation du fichier de configuration par défaut
RUN a2dissite 000-default.conf
# Activation du fichier par défaut
RUN a2ensite intranet.conf

