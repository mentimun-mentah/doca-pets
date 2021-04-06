#!/bin/bash
cp src/.env.example src/.env
bash command.sh composer install
bash command.sh artisan key:generate
bash command.sh artisan cache:clear 
bash command.sh artisan config:clear
bash command.sh npm install
