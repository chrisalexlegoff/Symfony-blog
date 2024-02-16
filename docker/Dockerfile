ARG SYMFONY_PARAMS="--version=7.0.*"

FROM php:8.2-apache
#RUN apt update && apt install -y zip git curl && git config --global user.email "you@example.com" && git config --global user.name "Your Name"
RUN apt update && apt install -y \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    curl \
    git \
    && git config --global user.email "legoffchristophealexandre@gmail.com" && git config --global user.name "legoffchristophealexandre@gmail.com" \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install zip \
    && docker-php-ext-install opcache 
RUN docker-php-ext-enable intl mbstring zip opcache
RUN pecl install xdebug apcu \
    && docker-php-ext-enable xdebug apcu
RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/xdebug.ini

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV SYMFONY_PARAMS_STD="--version=7.0.*"

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash && apt install -y symfony-cli

COPY apache-default.conf /etc/apache2/sites-available/000-default.conf
WORKDIR /var/www/html
VOLUME /var/www/html

# COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
COPY --link --chmod=755 docker-entrypoint.sh /usr/local/bin/docker-entrypoint

RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]