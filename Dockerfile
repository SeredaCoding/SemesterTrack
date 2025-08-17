# Imagem base PHP 8 com Apache
FROM php:8.2-apache

# Ativa módulos necessários
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Habilita mod_rewrite para URLs amigáveis
RUN a2enmod rewrite

# Copia o código do projeto para dentro do container
COPY ./public /var/www/html/

# Define a pasta raiz
WORKDIR /var/www/html

# Permissões (importante para Linux)
RUN chown -R www-data:www-data /var/www/html
