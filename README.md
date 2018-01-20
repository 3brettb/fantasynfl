# fantasynfl
Laravel NFL Fantasy Football


##Installation

Create new Laravel Web App `composer require laravel/laravel`

Install Laravel Auth `php artisan make:auth`

Remove the user table migration from database/migrations

run `composer require 3brettb/fantasynfl`

Change App\User class to extend FantasyNFL\Fantasy\Models\User

run `php artisan vendor:publish`

run `php artisan migrate`


## FantasyNFL API
Get Team Roster
```
FantasyNFL::roster([$team_id]);
```