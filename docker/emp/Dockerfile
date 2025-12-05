FROM php:8.2-fpm

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
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY ./app/emp /var/www/html

RUN composer update --no-interaction && composer install --no-interaction --prefer-dist

EXPOSE 9001
