# test_project_get_api

php 8.2
mysql 5.7

git clone git@github.com:gnkit/test_project_get_api.git\
docker-compose build\
docker-compose up -d\
docker exec -it laravelapi_app bash\
php artisan migrate --seed<br>

<strong>commands:<br></strong>
//store data\
store-{entity} {username} {dateFrom} {dateTo} {limit=500}<br>
php artisan store-order manager 2023-01-01 2023-01-02\
php artisan store-sale manager 2023-01-01 2023-01-02\
php artisan store-income manager 2023-01-01 2023-01-11\
php artisan store-stock manager 2023-09-04 (current date and limit default=500)<br>

//update all data\
php artisan update-data<br>

//create
php artisan create-company\
php artisan create-office\
php artisan create-account\
php artisan create-apiservice\
php artisan create-tokentype\
php artisan create-token<br>

//get
get {username} {entity} {date=null}\
php artisan get manager orders 2023-09-03\
php artisan get manager sales 2023-09-03\
php artisan get manager incomes 2023-09-03\
php artisan get manager stocks<br>
