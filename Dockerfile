FROM php:7.1-fpm
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y \
        git \
        mysql-client \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libssl-dev \
        libmemcached-dev \
        libz-dev \
        zlib1g-dev \
        zip \
        libxml2-dev \
        libcurl3-dev \
        libedit-dev \
        libpspell-dev \
        libldap2-dev \
        unixodbc-dev \
        libpq-dev \
        libicu-dev g++ \
        libtidy-dev \
        nano

RUN ln -fs /usr/lib/x86_64-linux-gnu/libldap.so /usr/lib/

RUN echo "Installing PHP extensions" \
    &&  rm -rf /tmp/pear \
    && docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) iconv mcrypt gd pdo_mysql pcntl zip curl bcmath opcache simplexml xmlrpc xml soap session readline pspell mbstring intl tidy \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-enable iconv mcrypt gd pdo_mysql pcntl zip curl bcmath opcache simplexml xmlrpc xml soap session readline pspell mbstring intl  \
    && apt-get autoremove -y \
    && dpkg -la | awk '{print $2}' | grep '\-dev' | xargs apt-get remove -y \
    && apt-get clean all \
    && rm -rvf /var/lib/apt/lists/* \
    && rm -rvf /usr/share/doc /usr/share/man /usr/share/locale \
    && rm -rvf /usr/src/php \
    && echo "date.timezone = America/Sao_Paulo" >> /usr/local/etc/php/conf.d/timezone.ini \
    && echo "display_errors = On" >> /usr/local/etc/php/conf.d/errors.ini \
    && echo "memory_limit=-1" > /usr/local/etc/php/conf.d/memory_limit.ini

EXPOSE 9000

COPY . ./
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
