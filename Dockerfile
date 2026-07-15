FROM webdevops/php-nginx:8.4-alpine

ENV WEB_DOCUMENT_ROOT=/app/public
ENV APP_ENV=production

WORKDIR /app

# Étape 1 : Copier d'abord les fichiers de dépendances (ordre important !)
COPY composer.json composer.lock ./
COPY package.json package-lock.json ./

# Étape 2 : Installer les dépendances PHP (cette couche est mise en cache tant que les .json ne changent pas)
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Étape 3 : Installer Node.js et npm
RUN apk add --no-cache nodejs npm

# Étape 4 : Installer les dépendances JS et builder (même principe de cache)
RUN npm ci && npm run build

# Étape 5 : Copier tout le reste du projet SEULEMENT MAINTENANT
COPY . .

# Ajout du script de déploiement
COPY scripts/00-laravel-deploy.sh /opt/docker/provision/entrypoint.d/
RUN chmod +x /opt/docker/provision/entrypoint.d/00-laravel-deploy.sh

# Droits
RUN chown -R application:application /app