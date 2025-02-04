# Use the official PHP 8.1 FPM image as the base image
FROM php:8.1-fpm

# Install system dependencies and PHP extensions required by Laravel and its packages
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
  && rm -rf /var/lib/apt/lists/*

# Allow Composer to run as root (common in container environments)
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install Composer from the official Composer image
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Set working directory
WORKDIR /var/www

# Copy the entire project into the container so that all necessary files (including artisan) are present.
COPY . .

# Run Composer install now that the entire application (including artisan) is available.
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Install npm dependencies
RUN npm install

# Optionally, run `npm run dev` or `npm run production` to build assets (uncomment if needed)
RUN npm run build

# Ensure Laravel’s storage and cache directories are writable by the web server
RUN chown -R www-data:www-data /var/www

# Expose port 9000 (the default port for PHP's built-in server)
EXPOSE 9000

# Start PHP’s built-in server with the document root set to the public folder
CMD ["php", "-S", "0.0.0.0:9000", "-t", "public"]
