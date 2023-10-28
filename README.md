# Symfony

## Commands

```bash
#### BASICS
# list symfony commands
symfony

# list symfony console commands
symfone console

# create webapp project
symfony new <dir> --version="6.3.*" --webapp

# run app
symfony server:start

# create controller + view
symfony console make:controller ExampleController

#### DATABASE
# create database
symfony console doctrine:database:create

# create/edit entity
symfony console make:entity <entity_name>

# create migrations
symfony console make:migration

# execute migrations
symfony console doctrine:migrations:migrate

#### FIXTURES
# create fixture class
symfony console make:fixtures ExampleFixture

# execute fixtures
yes | symfony console doctrine:fixture:load
```

## Docker

```bash
# run the app
docker compose up -d

# run commands inside the app container as root user
docker exec -u root -it symfony-app bash
```
