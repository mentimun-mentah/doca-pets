#!/bin/bash
mkdir src/storage/app/public/avatar
mkdir src/storage/app/public/doctor
mkdir src/storage/app/public/news
mkdir src/storage/app/public/pet
mkdir src/storage/app/public/treat

docker-compose up -d --build
bash cmd.sh composer install
bash cmd.sh artisan key:generate
bash cmd.sh artisan cache:clear 
bash cmd.sh artisan config:clear
bash cmd.sh artisan migrate:fresh
bash cmd.sh npm install
bash cmd.sh npm run production
docker-compose stop
docker-compose up -d
