# symfony


 php bin/console doctrine:migrations:execute 20190728115723 --down
 php bin/console cache:clear --no-warmup --env=dev
 php bin/console doctrine:migrations:diff
 php ./bin/console doctrine:migrations:migrate


 php bin/console make:fixtures
 php bin/console doctrine:fixtures:load
 ./bin/console doctrine:schema:update --force


 docker exec -it symfony-app /bin/bash
 docker-compose up -d --build
