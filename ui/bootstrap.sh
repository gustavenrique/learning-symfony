#!bin/bash

cd /var/www/

rm -rf ./vendor ./node_modules

composer install & (npm i -g yarn && yarn)

yarn run watch & symfony server:start