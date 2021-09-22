FROM php:8.0.0-fpm-buster as laravel_base

RUN curl https://deb.nodesource.com/setup_14.x | bash
RUN apt update -y
RUN apt install -y wget libjpeg-dev libfreetype6-dev && \
  apt install -y  libmagick++-dev \
  libmagickwand-dev \
  libpq-dev \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libpng-dev \
  libwebp-dev \
  libxpm-dev \
  libgmp-dev \
  git \
  unzip \
	nodejs

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
      docker-php-ext-install -j$(nproc) gd && \
    docker-php-ext-install mysqli pdo_mysql gmp
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN composer global require "laravel/installer"
ENV PATH $PATH:/root/.composer/vendor/bin/

FROM laravel_base as dev
WORKDIR /ph34
COPY . .
RUN composer install
ENTRYPOINT [ "php","artisan"]
