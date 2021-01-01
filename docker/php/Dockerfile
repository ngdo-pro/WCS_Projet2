FROM php:5.6-fpm

RUN apt-get update && apt-get install -y git unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

RUN printf '[PHP]\ndate.timezone = "Europe/Paris"\n' > /usr/local/etc/php/conf.d/tzone.ini
RUN "date"

RUN docker-php-ext-install pdo pdo_mysql

COPY --chown=1000:1000 ./ /var/www/rdm

WORKDIR /var/www/rdm
