FROM php:8.2-apache

# 1. Dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpq-dev unzip curl git \
    && docker-php-ext-install pdo pdo_pgsql

# 2. Node.js 20
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# 3. Apache mod_rewrite
RUN a2enmod rewrite

# 4. Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Copiar código
COPY . /var/www/html
WORKDIR /var/www/html

# 6. Instalar dependencias PHP v2
RUN composer install --no-dev --optimize-autoloader --no-scripts

# 7. Instalar dependencias JS y compilar
RUN npm install && npm run build

# 8. Permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 9. Configurar Apache → /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/sites-available/*.conf \
        /etc/apache2/apache2.conf \
        /etc/apache2/conf-available/*.conf \
    && sed -ri -e 's/AllowOverride None/AllowOverride All/g' \
        /etc/apache2/apache2.conf \
    && echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80

CMD php artisan config:clear \
    && php artisan migrate --force \
    && php artisan db:seed --force \
    && apache2-foreground