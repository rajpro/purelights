FROM php:apache
# Working Directory
WORKDIR /var/www/html
# Copy App
COPY . /var/www/html
# Run Some Commands
RUN apt-get update
RUN docker-php-ext-install mysqli
RUN a2enmod rewrite
RUN chown www-data:www-data -R *
RUN chown www-data:www-data .htaccess
RUN chmod -R 777 *
RUN chmod 777 .htaccess