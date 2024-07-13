FROM php:8.1-fpm

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

COPY . .

CMD php artisan serve --host=0.0.0.0 --port=80
