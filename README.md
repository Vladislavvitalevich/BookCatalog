<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Запуск Laravel каталог книг


- git clone https://github.com/Vladislavvitalevich/BookCatalog.git 
- cd ./BookCatalog
- настроить подключение к бд в файле .env
- composer install
- npm install
- npm run dev
- php artisan migrate
- php artisan db:seed --class=UserSeeder
- php artisan storage:link
- php artisan key:generate
- php artisan serve


go to: https://127.0.0.1:8000
admin url: https://127.0.0.1:8000/admin
