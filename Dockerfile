FROM php:apache

RUN apt-get update \ 
  && apt-get install --yes --no-install-recommends libpq-dev \
  && apt-get install --yes zlib1g-dev \
  && apt-get install --yes libzip-dev \  
  && docker-php-ext-install zip \
  && echo no | pecl install stomp \
  && docker-php-ext-enable stomp  