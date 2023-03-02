FROM php:8.1-fpm

WORKDIR /var/www/app

COPY artists/ .
COPY php/entrypoint.sh /

# Installing dependencies for the PHP modules
RUN apt-get update
RUN apt-get install -y zip libzip-dev libpng-dev libicu-dev libonig-dev libcurl4-gnutls-dev libxml2-dev

# Installing additional PHP modules
RUN docker-php-ext-install mysqli pdo pdo_mysql gd zip bcmath ctype intl mbstring opcache xml dom curl
RUN pecl install redis && docker-php-ext-enable redis
RUN echo '\nphp_flag[display_errors] = on' >> /usr/local/etc/php-fpm.d/www.conf;
RUN echo '\nphp_admin_value[error_log] = /var/log/fpm-php.www.log' >> /usr/local/etc/php-fpm.d/www.conf;
RUN echo '\nphp_admin_flag[log_errors] = on' >> /usr/local/etc/php-fpm.d/www.conf;
RUN echo '\nphp_admin_value[memory_limit] = 2048M' >> /usr/local/etc/php-fpm.d/www.conf;
RUN echo '\nphp_admin_value[short_open_tag] = on' >> /usr/local/etc/php-fpm.d/www.conf;

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer install

