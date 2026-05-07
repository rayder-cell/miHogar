#!/bin/bash
set -e

echo "Limpiando configuración..."
php artisan config:clear

echo "Ejecutando migraciones..."
php artisan migrate --force || echo "Migraciones fallaron, continuando..."

echo "Iniciando Apache..."
exec apache2-foreground