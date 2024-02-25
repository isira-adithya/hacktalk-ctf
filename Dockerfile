# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY ./src/* .

# Install PDO extension for MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Update the default Apache site with the config we created
ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache when the container launches
CMD ["apache2-foreground"]
