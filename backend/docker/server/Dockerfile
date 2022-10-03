FROM php:8.1-apache

RUN a2enmod rewrite

RUN apt-get update && apt-get upgrade -y && apt-get install -y \
    git \
    unzip \
    zip \
    nodejs \
    npm \
    sudo

WORKDIR /var/www/html

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions gd pdo_mysql bcmath zip intl opcache

COPY --from=composer:2.0 /usr/bin/composer /usr/local/bin/composer

#ezt valahogy még bele kell építeni hogy node 16 legyen rajta
#https://techviewleo.com/install-nodejs-and-npm-on-debian-linux/
#curl -sL https://deb.nodesource.com/setup_16.x | sudo bash -
# sudo apt -y install nodejs