FROM php:8.1.5-fpm

RUN apt-get update && apt-get install -y --no-install-recommends libxslt-dev zlib1g-dev librabbitmq-dev libssh-dev g++ git libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql xsl bcmath sockets \
    && pecl install apcu \
    && pecl install amqp \
    && pecl install xdebug \
    && docker-php-ext-enable apcu \
    && docker-php-ext-enable amqp \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

WORKDIR /var/www/project
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony
