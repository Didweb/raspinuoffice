FROM php:7.4-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    zlib1g-dev \
    libpng-dev \
    zip \
    unzip \
    libxml2-dev \
    libzip-dev \
    wkhtmltopdf \
    libssl-dev \
    libpq-dev;

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

RUN docker-php-ext-install \
    gd \
    exif \
    zip \
    intl \
    mysqli \
    opcache \
    pdo pdo_mysql;



RUN docker-php-ext-enable opcache;


RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
#    && php -r "if (hash_file('SHA384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php --filename=composer \
    && php -r "unlink('composer-setup.php');" \
    && mv composer /usr/local/bin/composer

VOLUME /var/www/html
WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www

ENV COMPOSER_ALLOW_SUPERUSER=1;


RUN pecl install xdebug; \
   docker-php-ext-enable xdebug;



RUN echo "xdebug.start_with_request=trigger" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    echo "xdebug.max_nesting_level=1000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    echo "xdebug.client_host=localhost" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    echo "xdebug.client_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    echo "xdebug.mode=debug,develop" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    echo "xdebug.log_level=/var/www/html/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini;

RUN rm "$PHP_INI_DIR/php.ini-production"; \
    mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini";

RUN echo "memory_limit = -1;" >> /usr/local/etc/php/conf.d/php.ini
RUN echo "max_execution_time = 0;" >> /usr/local/etc/php/conf.d/php.ini
RUN echo "set_time_limit = -1;" >> /usr/local/etc/php/conf.d/php.ini
RUN echo "max_input_time = -1;" >> /usr/local/etc/php/conf.d/php.ini