# symfony-cli

# TO DO:

 - add custom php.ini config


# Using docker compose

`docker-compose up`

`docker exec php81-container bin/console doctrine:database:create`

`docker exec php81-container bin/console doctrine:migrations:migrate`

**Optionally on Dev** To populate user table:

`docker exec php81-container bin/console doctrine:fixtures:load`

This will create test users all with the same password: `password`
