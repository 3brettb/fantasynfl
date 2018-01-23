# FantasyNFL API
FantasyNFL stores several variables within a session to make data access
from the API seamless and simple.

The API also provides mutator methods to interact with the database. These
methods also leverage those session variables to make the process simplistic
and efficient.

## Accessors
### League
```php
FantasyNFL::league();

FantasyNFL::find($league_id);; // Alias to retrieve by id
```

### League activity
```php
FantasyNFL::activity();
```

### Season
```php
FantasyNFL::season();

// or a specific season

FantasyNFL::season(2016);
```

### Weeks
```php
FantasyNFL::weeks();

// or for a specific season
FantasyNFL::weeks(2016);

// The current week
FantasyNFL::week()

// An individual week
FantasyNFL::week(2)

// A specific week in a given year
FantasyNFL::week(4, 2016);
```

### Team
```php
// The current user's team
FantasyNFL::team();

// Team by id
FantasyNFL::team(82963);
```

### Divisions
```php
FantasyNFL::divisions();
```

### Draft
```php
// Current (Upcoming)
FantasyNFL::draft();

// By year
FantasyNFL::draft(2016);

// Draft picks for current user's team
FantasyNFL::draftpicks();

// Draft picks for team (by id)
FantasyNFL::draftpicks(87212);

// Draft picks for a team in a given year
FantasyNFL::draftpicks(87212, 2018);
```

### Rosters and Lineups
Rosters contain a collection of players that a team currently has right to.
```php
// Current user's roster
FantasyNFL::roster();

// Roster for team (by id)
FantasyNFL::roster(87212);
```
Lineups are a determined order of players set on a weekly basis and used to determine
scoring for each game.<br>
Lineups can be selected by `team_id`, `week`, and `year`. There is an alias method `mylineup()`
used to select the current user's lineup based on week and year.
```php
// current user's lineup
FantasyNFL::lineup();

// team id. for current week
FantasyNFL::lineup(87212);

// team id and week number
FantasyNFL::lineup(87212, 3);

// team id, week number and year
FantasyNFL::lineup(87212, 7, 2017);

// week number
FantasyNFL::mylineup(3);

// week number and year
FantasyNFL::mylineup(2, 2016);
```

### Players
```php
FantasyNFL::players();

// by player id
FantasyNFL::player(2543583);
```

### Games
Games are fantasy matchups between two fantasy teams. Games can be selected by `team_id`, `week`, and `year`. 
There is an alias method `mygame()` that allows the current user's games to be returned by week and year.
```php
FantasyNFL::games();

// for a given week
FantasyNFL::games(3);

// for a given year
FantasyNFL::games(3, 2017);

// Current game for current user
FantasyNFL::game();

// by team id
FantasyNFL::game(87212);

// by team id and week number
FantasyNFL::game(87212, 3);

// by team id, week number, and year
FantasyNFL::game(87212, 3, 2017);
```

### Standings
```php
FantasyNFL::standings();
```



## Mutators