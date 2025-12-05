FROM php:8.2-fpm

ENV PUSHER_APP_ID=""
ENV PUSHER_APP_KEY=""
ENV PUSHER_APP_SECRET=""

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    libxml2-dev \
    pkg-config \
    && docker-php-ext-install mbstring zip bcmath xml \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY ./app/search /var/www/html

RUN composer update --no-interaction && composer install --no-interaction --prefer-dist

EXPOSE 9002

