# Image PHP 8.4 + Nginx sur Alpine
FROM webdevops/php-nginx:8.4-alpine

# Dossier public Laravel servi par Nginx
ENV WEB_DOCUMENT_ROOT=/app/public

# Mode production Laravel
ENV APP_ENV=production

# Dossier de travail
WORKDIR /app

# Copie du projet
COPY . .

# Installation des dépendances PHP
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Installation de Node.js et npm
RUN apk add --no-cache nodejs npm

# Installation et build frontend
RUN npm ci && npm run build

# Ajout du script de déploiement Laravel
COPY scripts/00-laravel-deploy.sh /opt/docker/provision/entrypoint.d/00-laravel-deploy.sh

# Rendre le script exécutable
RUN chmod +x /opt/docker/provision/entrypoint.d/00-laravel-deploy.sh

# Donner les droits à l'utilisateur de l'application
RUN chown -R application:application /app