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
    && pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && rm -rf /var/lib/apt/lists/*


RUN apt-get install -y libxml2-dev

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY ./app/realz /var/www/html

RUN composer config --global audit.ignore true

RUN composer update --no-interaction --ignore-platform-req=ext-mongodb && composer install --no-interaction --prefer-dist --ignore-platform-req=ext-mongodb

EXPOSE 9003

