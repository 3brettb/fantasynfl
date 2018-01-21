# fantasynfl
Laravel NFL Fantasy Football


### Installation

Create new Laravel Web App `composer require laravel/laravel`

Install Laravel Auth `php artisan make:auth`

Remove the user table migration from database/migrations

run `composer require 3brettb/fantasynfl`

Change App\User class to extend FantasyNFL\Fantasy\Models\User

run `php artisan vendor:publish`

run `php artisan migrate`

Add an `authenticated()` method to LoginController
```php
    /**
     * Perform Fantasy NFL Login actions
     *
     * @param Request $request
     * @param $user
     */
    public function authenticated(Request $request, $user)
    {
        FantasyNFL::login($user);
    }
```

### FantasyNFL API
Get Team Roster
```php
FantasyNFL::roster($team_id);
```
Get League
```php
FantasyNFL::find($league_id);
``` 
Get League Activity
```php
$league->activity()
```
Get Entities involved with Activity
```php
$activity->involved[0]->get()
```
Get Link `<a> tag` associated with activity
```php
$activity->links[0]->a_tag();
```
Get League Divisions
```php
$league->divisions()
// -- or --
$league->division($division_id)
```
Get Division Teams
```php
$division->teams()
```
Get Week
```php
$league->week() // to get current week
$league->week($week_number) // to get specific week of current season
$league->week($week_number, $year) // returns week of the given season and number
```
Get Season
```php
$league->season() // to get current season
$league->season($year) // to get specific season by year
```