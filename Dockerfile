FROM php:8.2-apache

# Install PDO PostgreSQL driver
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Enable mod_rewrite for router
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy application code, excluding .env
COPY . /var/www/html
RUN rm -f /var/www/html/.env

# Copy Apache Config
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html/storage


# Expose port
EXPOSE 80
