# Start from the PHP 8.0 FPM image
FROM php:8.2-fpm

# Install system dependencies for Composer and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install zip pdo_pgsql pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/html/public"]
