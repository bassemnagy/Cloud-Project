FROM php:7.4.33-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

#expose port 80
EXPOSE 80