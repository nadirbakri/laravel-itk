FROM php:8.0-fpm-alpine

WORKDIR /app

RUN apk update && apk add --no-cache \
    git \
    libpng-dev \
    libzip-dev \
    zip \
    unzip

RUN docker-php-ext-install pdo pdo_mysql sockets gd zip

RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .
RUN composer install