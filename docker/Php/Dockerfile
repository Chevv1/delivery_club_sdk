FROM php:7.4-cli-alpine

RUN set -xe && apk update && apk upgrade

RUN apk add --no-cache \
    libzip-dev \
    libintl \
    icu \
    icu-dev \
    bash \
    curl \
    libmcrypt \
    libmcrypt-dev \
    libxml2-dev \
    freetype \
    freetype-dev \
    libpng \
    libpng-dev \
    libjpeg-turbo \
    libjpeg-turbo-dev \
    postgresql-dev \
    pcre-dev \
    g++ \
    git \
    make \
    autoconf

RUN docker-php-ext-install intl opcache pdo_pgsql zip pcntl sockets exif

RUN docker-php-source extract \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-source delete

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/app
