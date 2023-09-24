FROM php:8.1-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY . .
COPY .env.example .env

# Defina as variáveis de ambiente no Dockerfile
ARG DB_CONNECTION=mysql
ARG DB_HOST=localhost
ARG DB_PORT=3306
ARG DB_DATABASE=db
ARG DB_USERNAME=root
ARG DB_PASSWORD=123
# Substitua as variáveis no arquivo .env pelas variáveis de ambiente
RUN sed -i "s/DB_HOST=.*/DB_HOST=${DB_HOST}/" .env \
    && sed -i "s/DB_PORT=.*/DB_PORT=${DB_PORT}/" .env \
    && sed -i "s/DB_DATABASE=.*/DB_DATABASE=${DB_DATABASE}/" .env \
    && sed -i "s/DB_USERNAME=.*/DB_USERNAME=${DB_USERNAME}/" .env \
    && sed -i "s/DB_PASSWORD=.*/DB_PASSWORD=${DB_PASSWORD}/" .env

RUN composer install
RUN php artisan route:cache && php artisan view:cache
RUN php artisan key:generate

CMD ["php", "artisan", "serve", "--host=0.0.0.0"]