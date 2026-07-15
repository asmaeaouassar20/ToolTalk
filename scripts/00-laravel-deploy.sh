#!/bin/bash
php artisan key:generate
php /app/artisan config:cache
php /app/artisan route:cache
php /app/artisan migrate --force