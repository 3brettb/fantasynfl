# League Data Object

## Public Properties
```php
$league->id // integer id
```

## Public Methods
All of these methods will return Data Objects or lists of Data Objects of the specified type
```php
$league->activity([$activity_id]) // returns list of League Activity or Activity by Id

$league->divisions() // returns list of current League Divisions

$league->division($division_id) // returns Division by Id

$league->teams() // returns list of League Teams

$league->week([$week_number [, $year]]) // returns current Week, or a Week specified by number and optional year

$league->season([$year]) // returns current Season, or Season specified by year
```
