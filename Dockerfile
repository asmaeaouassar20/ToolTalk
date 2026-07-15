FROM webdevops/php-nginx:8.4-alpine

ENV WEB_DOCUMENT_ROOT=/app/public
ENV APP_ENV=production

WORKDIR /app

COPY . .

RUN composer install --no-interaction --optimize-autoloader --no-dev

RUN apk add --no-cache nodejs npm
RUN npm ci && npm run build

COPY scripts/00-laravel-deploy.sh /opt/docker/provision/entrypoint.d/00-laravel-deploy.sh
RUN chmod +x /opt/docker/provision/entrypoint.d/00-laravel-deploy.sh

RUN chown -R application:application /app