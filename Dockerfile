# Use the official PHP 8.1 image as the base image
FROM php:8.1-apache

# Set some ENV variables
ARG UID=1000
ARG GID=1000

# Install necessary extensions and libraries
RUN apt-get update && \
    apt-get install -y \
        libicu-dev \
        mlocate \
        libsodium-dev \
        libonig-dev \
        zlib1g-dev \
        libzip-dev \
    && docker-php-ext-install pdo_mysql intl mbstring zip sodium \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug
# Set the working directory to the web root
WORKDIR /var/www/html

# Run the commands as the "www-data" user
RUN usermod -u $UID www-data && \
    groupmod -g $GID www-data && \
    chown -R www-data:www-data /var/www/html

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable Apache modules
RUN a2enmod rewrite

# Copy the application files
COPY . /var/www/html

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Set the correct permissions for the storage directory
RUN chmod -R 775 /var/www/html/storage && \
    chown -R www-data:www-data /var/www/html/storage

# Copy Apache vhost file to proxy php requests to php-fpm container
COPY ./docker/apache-config.conf /etc/apache2/sites-available/000-default.conf

# Update the locate database
RUN updatedb

# Expose port 80 for web traffic
EXPOSE 80

# Make the script executable
RUN chmod +x copy-env.sh

# Define the command to run your script
CMD ["./copy-env.sh"]


# Start Apache web server
CMD ["apache2-foreground"]