FROM php:8.2-fpm

WORKDIR /var/www

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# Extensões PHP necessárias
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# COPIA SÓ composer.json e composer.lock 
COPY composer.json composer.lock ./

# INSTALA AS DEPENDÊNCIAS PHP (cria vendor/)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# AGORA copia TODO o restante do código
COPY . /var/www

# Permissões
RUN chown -R www-data:www-data /var/www

CMD php artisan migrate:fresh --seed --force && php-fpm