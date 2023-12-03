# Use the official PHP 8.0 FPM image based on Alpine Linux
FROM php:8.0-fpm-alpine

# Set the working directory to /app
WORKDIR /app

# Update the package manager and install necessary dependencies
RUN apk update && apk add --no-cache \
    git \
    libpng-dev \
    libzip-dev \
    postgresql-dev \
    zip \
    unzip
RUN apk add supervisor
# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql pgsql sockets gd zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer​ | php -- \
     --install-dir=/usr/local/bin --filename=composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Copy the application code into the container
COPY . .

# Install Composer dependencies
RUN composer install
# RUN php artisan queue:listen
COPY php.ini /usr/local/etc/php/php.ini
# COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf
# RUN chown -R www-data:www-data storage/logs
# RUN chown -R www-data:www-data storage/framework

# ENV PHP_MEMORY_LIMIT=512M
# Expose port 9000 (this is usually used for connecting to a web server)
EXPOSE 9000
CMD php artisan serve --host=0.0.0.0 --port=9000
# CMD ["supervisord", "-n"]
# Start the PHP-FPM server with Laravel's built-in server
# CMD ["php-fpm"]
