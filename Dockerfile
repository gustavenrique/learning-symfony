FROM php:8.2-fpm-bookworm AS buider

# Installing packages
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    vim \
    libicu-dev

RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql intl

RUN curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash \
    && apt install symfony-cli

# Installing app dependencies
WORKDIR /var/www
COPY ./ ./
RUN composer install

# Changing user
RUN groupadd --force -g 1000 dev
RUN useradd -ms /bin/bash --no-user-group -g 1000 -u 1000 dev
USER $USER

CMD ["symfony", "server:start"]