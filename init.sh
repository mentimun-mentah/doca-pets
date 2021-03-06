#!/bin/bash
mkdir src/storage/app/public/avatar
mkdir src/storage/app/public/doctor
mkdir src/storage/app/public/news
mkdir src/storage/app/public/pet
mkdir src/storage/app/public/treat
mv src/storage/logo.png src/storage/app/public/
mv src/storage/default.png src/storage/app/public/avatar/

docker-compose up -d --build
bash cmd.sh composer install
bash cmd.sh artisan key:generate
bash cmd.sh artisan cache:clear 
bash cmd.sh artisan config:clear
bash cmd.sh npm install
docker-compose stop
docker-compose up -d
bash cmd.sh artisan migrate:fresh
bash cmd.sh artisan storage:link
bash cmd.sh npm run watch
