FROM phpdockerio/php73-fpm:latest
WORKDIR "/application"

RUN apt-get update \
    && apt-get install -y --no-install-recommends apt-utils \
    && apt-get -y install php7.3-mysql php7.3-mbstring php7.3-curl php7.3-xml \
    && apt-get -y --no-install-recommends install php-xdebug \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
        && echo "xdebug.remote_enable=on" >> /etc/php/7.3/mods-available/xdebug.ini \
        && echo "xdebug.remote_port=9000" >> /etc/php/7.3/mods-available/xdebug.ini \
        && echo "xdebug.remote_autostart=on" >> /etc/php/7.3/mods-available/xdebug.ini \
        && echo "xdebug.remote_connect_back=0" >> /etc/php/7.3/mods-available/xdebug.ini \
        && echo "xdebug.remote_host=172.17.0.1" >> /etc/php/7.3/mods-available/xdebug.ini

ENV PHP_IDE_CONFIG="serverName=xdebug-docker"
