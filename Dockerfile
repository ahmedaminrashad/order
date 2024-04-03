FROM php:8.2-cli
COPY . /usr/src/order-management
WORKDIR /usr/src/order-management
CMD [ "php", "./your-script.php" ]
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install