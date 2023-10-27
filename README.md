# Symfony

## Commands

```bash
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

# create database
symfony console doctrine:database:create

# create/edit entity
symfony console make:entity <entity_name>
```

## Docker

```bash
# run the app
docker compose up -d

# run commands inside the app container as root user
docker exec -u root -it symfony-app bash
```
