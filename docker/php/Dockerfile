FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl pdo_mysql -j$(nproc) gd \
    && usermod -u 1000 www-data

RUN docker-php-ext-enable opcache intl

COPY php.ini "$PHP_INI_DIR/php.ini"

WORKDIR /app