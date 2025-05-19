FROM php:latest as php

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

COPY . .
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV PORT=8000

RUN chmod +x Docker/entrypoint.sh

ENTRYPOINT [ "Docker/entrypoint.sh" ]
