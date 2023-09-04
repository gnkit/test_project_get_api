# test_project_get_api

php 8.2
mysql 5.7

git clone git@github.com:gnkit/test_project_get_api.git\
docker-compose build\
docker-compose up -d\
docker exec -it laravelapi_app bash\
php artisan migrate<br>

<strong>commands:<br></strong>
//store data\
store-{entity} {dateFrom} {dateTo} {limit=500}<br>
php artisan store-order 2023-01-01 2023-01-02\
php artisan store-sale 2023-01-01 2023-01-02\
php artisan store-income 2023-01-01 2023-01-11\
php artisan store-stock 2023-09-04 (current date and limit default=500)<br>

//update all data\
php artisan update-data<br>

php artisan create-company\
php artisan create-office\
php artisan create-account\
php artisan create-apiservice\
php artisan create-tokentype\
php artisan create-token\
