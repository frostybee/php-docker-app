FROM php:8.4-apache

# Install system dependencies for PHP extensions
RUN apt-get update && apt-get install -y \
    libcurl4-openssl-dev \
    libonig-dev \
    libicu-dev \
    libzip-dev \
    libpng-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql curl mbstring intl zip gd

# Enable Apache mod_rewrite for .htaccess
RUN a2enmod rewrite

# Copy custom Apache virtual host config
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Copy application files
COPY . /var/www/html/

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
