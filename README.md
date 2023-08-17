# test_project_get_api

MySQL 8.0 PhpMyAdmin 5.1\
https://phpmyadmin.freedb.tech/index.php \
host:		sql.freedb.tech\
port:		3306\
db_name:	freedb_laravel_apitest\
db_user:	freedb_laravel_apitest\
db_pass:	A?hhWCsA3yAPDY5<br>


git clone git@github.com:gnkit/test_project_get_api.git\
docker-compose build\
docker-compose up -d\
docker exec -it laravelapi_app bash\
php artisan migrate\

commands to store:\
#1\
app:{entity}-store {dateFrom} {dateTo} {limit=500}\

php artisan app:order-store 2023-01-01 2023-01-02\
php artisan app:order-sales 2023-01-01 2023-01-02\
php artisan app:order-incomes 2023-01-01 2023-01-11\
php artisan app:order-stocks 2023-08-17 (current date and limit default=500)\

#2\
app:store {endpoint} {dateFrom} {dateTo=null} {limit=500}\

php artisan app:store orders 2023-01-01 2023-01-02\
php artisan app:store sales 2023-01-01 2023-01-02\
php artisan app:store incomes 2023-01-01 2023-01-10\
php artisan app:store stocks 2023-08-17\
