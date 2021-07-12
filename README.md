Инструкция по запуску

1. git clone https://github.com/levanidus/comments.git ${HOME}/comments
2. cd ${HOME}/comments
3. sudo chmod +x setup.sh  
4. Запускаем ./setup.sh
5. Прописываем в .env
DB_HOST=mysql
DB_DATABASE=app
DB_USERNAME=root
DB_PASSWORD=secret 
6. docker-compose up -d
7. Подождать чтобы сервисы запустились
8. docker exec -ti app_phpfpm bash -c "php artisan migrate && php artisan key:generate"
9. В браузере - http://localhost:8080
