# UII Project
Website bursa project

# Setup Guide

## Requirement
1. PHP version >= 7.2
2. Composer
3. php-pgsql and all [PHP-ext for laravel 5.8] (https://laravel.com/docs/5.8/installation#installation)
4. Database Postgresql version >= 9.6

## Instalation
1. Clone this repository
2. Install dependency `composer install`
3. Copy `.env.example` to `.env`
4. generate application key `php artisan key:generate`
5. Setup variables in `.env` file
   ```
   DB_DATABASE=yourdatabasename
   DB_USERNAME=yourdatabaseusername
   DB_PASSWORD=yourdatabasepassword

   GOOGLE_CLIENT_ID=yourgoogleclientid
   GOOGLE_CLIENT_SECRET=yourgoogleclientsecret
   ```
6. Run migration and seed `php artisan migrate --seed`
7. start server `php artisan serve`
