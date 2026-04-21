FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    git \
    && docker-php-ext-install zip pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY composer.json composer.lock ./