# fantasynfl
Laravel NFL Fantasy Football


##Installation

Create new Laravel Web App (composer require laravel/laravel)

Install Laravel Auth (php artisan make:auth)

Remove the user table migration from database/migrations

composer require 3brettb/fantasynfl

Change App\User class to extend FantasyNFL\Fantasy\Models\User

php artisan vendor:publish

php artisan migrate