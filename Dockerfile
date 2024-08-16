# Use PHP 8.1.2 as the base image
FROM php:8.1.2-fpm

# Set the working directory
WORKDIR /yoyo-pos

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clean up the cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
#RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer

# Copy project files to the container
COPY . /yoyo-pos

# Set the correct permissions for the project files
RUN chown -R www-data:www-data /yoyo-pos

# Switch to the www-data user
#USER www-data

# Expose the service port
EXPOSE 9000

# Set the default command
CMD ["php-fpm"]

