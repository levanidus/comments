Инструкция по запуску

1. git clone https://github.com/levanidus/comments.git ${HOME}/comments
2. mkdir ${HOME}/commentsmysql
3. cd ${HOME}/comments
4. cp .env.example .env
5. Прописываем в .env
DB_HOST=mysql
DB_DATABASE=app
DB_USERNAME=root
DB_PASSWORD=secret
6. docker-compose build phpfpm
7. docker run --rm -i -t -v ${HOME}/comments:/var/www comments_phpfpm /bin/bash -c "composer install && npm install"
8. docker-compose up -d
9. docker exec -ti app_phpfpm bash -c "php artisan migrate && php artisan key:generate" 
10. В браузере - http://localhost:8080
