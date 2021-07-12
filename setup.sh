!#/bin/bash

mkdir ${HOME}/commentsmysql
cd ${HOME}/comments
cp .env.example .env
docker-compose build phpfpm
docker run --rm -i -t -v ${HOME}/comments:/var/www comments_phpfpm /bin/bash -c "composer install && npm install"
docker-compose up -d
docker exec -ti app_phpfpm bash -c "php artisan migrate && php artisan key:generate"
