docker-compose up -d

docker-compose exec server bash

php artisan key:generat
php artisan migrate
php artisan db:seed


backend login

email:  admin@admin.com
pass:  adminadmin