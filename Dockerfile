FROM php:8.2-apache

# Install necessary packages
RUN apt-get update && \
    apt-get install -y zlib1g-dev libzip-dev mariadb-client && \
    docker-php-ext-install zip pdo_mysql && \
    a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /docker-tests

# Set Apache DocumentRoot to Laravel public directory
ENV APACHE_DOCUMENT_ROOT=/docker-tests/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Expose port 80
EXPOSE 80

CMD ["apache2-foreground"]
