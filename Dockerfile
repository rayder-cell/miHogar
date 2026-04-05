FROM php:8.2-apache

# 1. Instalar dependencias del sistema y extensiones PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    curl \
    && docker-php-ext-install pdo pdo_pgsql

# 2. INSTALAR NODE.JS Y NPM (Necesario para Vite)
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# 3. Habilitar mod_rewrite
RUN a2enmod rewrite

# 4. Copiar código
COPY . /var/www/html

# 5. Configurar Apache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 6. Instalar dependencias de PHP (Composer)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 7. INSTALAR DEPENDENCIAS DE JS Y COMPILAR (Para que aparezca el manifest.json)
RUN npm install && npm run build

# 8. Permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

# 9. Ejecutar
CMD php artisan config:clear && php artisan migrate --force && apache2-foreground