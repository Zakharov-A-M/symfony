DOCKER_COMPOSE?=docker-compose
EXEC?=$(DOCKER_COMPOSE) exec symfony-app
COMPOSER=$(EXEC) composer

start: build up db perm

build:
	$(DOCKER_COMPOSE) pull --ignore-pull-failures
	$(DOCKER_COMPOSE) build --force-rm --pull

up:
	$(DOCKER_COMPOSE) up -d --remove-orphans

perm:
	$(EXEC) chown -R www-data:root var

clear: perm
	-$(EXEC) rm -rf var/cache/*
	-$(EXEC) rm -rf var/sessions/*
	-$(EXEC) rm -rf var/log/*

vendor:
	$(COMPOSER) install -n

php-unit:
	# 	 ./vendor/bin/phpunit tests/

wait-for-db:
	$(EXEC) php -r "set_time_limit(60);for(;;){if(@fsockopen('symfony-db',5432)){echo \"db ready\n\"; break;}echo \"Waiting for db\n\";sleep(1);}"

db: vendor wait-for-db
	$(EXEC) ./bin/console doctrine:migrations:migrate -n
