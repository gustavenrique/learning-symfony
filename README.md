# Symfony

This is a mini-project I made, in order to learn the basic Symfony features, from Routing and DI to Events and Security, 
as well as integrating it with some front-end tech stack.

## Pages
### Welcome
<img src='https://github.com/gustavenrique/learning-symfony/assets/81171856/79430b62-84a2-41f0-9ae8-a20fb0e85d20' width='700px' />

### Auth
<img src='https://github.com/gustavenrique/learning-symfony/assets/81171856/05d0cee8-ac85-4cc3-98ca-a09d561a214f' width='350px' />
<img src='https://github.com/gustavenrique/learning-symfony/assets/81171856/37e5eb0a-e69e-4e64-a2d7-af033b0ceb6f' width='350px' />

### Movies
<img src='https://github.com/gustavenrique/learning-symfony/assets/81171856/c42994bc-6aac-49f7-96c0-8d67053a8c31' width='350px' />
<img src='https://github.com/gustavenrique/learning-symfony/assets/81171856/54f36b93-9692-4440-ac34-00a6cbe69ff6' width='350px' />




## Commands
### Basics

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

# see services symfony provides outta the box
symfony console debug:autowiring

# see all event listeners and subscribers
symfony console debug:event-dispatcher
```

### Database
```bash
# create database
symfony console doctrine:database:create

# create/edit entity
symfony console make:entity <entity_name>

# create migrations
symfony console make:migration

# execute migrations
symfony console doctrine:migrations:migrate
```

### Data Fixtures
```bash
# create fixture class
symfony console make:fixtures ExampleFixture

# execute fixtures
yes | symfony console doctrine:fixture:load
```

## VS Code Setup
```bash
# Install recommended extensions
## Bash
cat .vscode/extensions.list |% { code --install-extension $_}

## Powershell
Get-Content .vscode/extensions.list | ForEach-Object { code --install-extension $_ }
```

## Webpack
```bash
##### install webpack-encore
# setup typescript
npx tsc --init && yarn add --dev typescript ts-loader

# setup sass
yarn add --D sass-loader sass

# install webpack-encore
composer require symfony/webpack-encore-bundle
```

## Docker

```bash
# run the app
docker compose up -d

# run commands inside the app container as root user
docker exec -u root -it symfony-app bash

# copy node_modules and vendor code from docker container
sudo docker cp symfony-app:/var/www/node_modules .ui && \
sudo docker cp symfony-app:/var/www/vendor .ui
```

## Vue + Inertia
```bash
# setup
yarn add @inertiajs/vue3 vue vue-loader@17.0.0

composer require rompetomp/inertia-bundle # specific for symfony

# composer require twig encore symfony/serializer-pack
```

## TailwindCSS
```bash
# install dependencies
yarn add -D tailwindcss postcss-loader

# create tailwind and postcss config files
npx tailwindcss init -p
```

## Vuetify
```bash
yarn add webpack-plugin-vuetify vuetify

# choose which icons you want
yarn add @mdi/font @fortawesome/fontawesome-free -D 
```
