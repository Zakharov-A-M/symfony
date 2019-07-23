FROM ubuntu:latest

ADD ./docker/000-default.conf /etc/apache2/sites-available

COPY --chown=www-data composer.json /var/www/html
COPY --chown=www-data composer.lock /var/www/html