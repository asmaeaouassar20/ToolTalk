FROM webdevops/php-nginx:8.4-alpine

ENV WEB_DOCUMENT_ROOT=/app/public
ENV APP_ENV=local

WORKDIR /app

# Copier d'abord les fichiers de dépendances (ordre important !)
COPY composer.json composer.lock ./
COPY package.json package-lock.json ./

#  Installer les dépendances PHP (cette couche est mise en cache tant que les .json ne changent pas)
RUN composer install --no-interaction --optimize-autoloader --no-scripts

# Installer Node.js et npm
RUN apk add --no-cache nodejs npm

# Installer les dépendances JS 
RUN npm ci 

# Copier tout le reste du projet SEULEMENT MAINTENANT
COPY . .

Run composer dump-autoload

# builder 
RUN npm run build

# Ajout du script de déploiement
COPY scripts/00-laravel-deploy.sh /opt/docker/provision/entrypoint.d/
RUN chmod +x /opt/docker/provision/entrypoint.d/00-laravel-deploy.sh

# Droits
RUN chown -R application:application /app