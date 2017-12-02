<?php

return [

    /*
    |--------------------------------------------------------------------------
    | NFL API Data Configuration
    |--------------------------------------------------------------------------
    |
    | This option controls the data source "source" NFL API uri for retrieving
    | data from and interacting with the NFL API
    |
    | The Source dictates whether the interaction is exclusively with the api,
    | or if the api is queried and results are stored in the database
    |
    | Options for source: api, database
    |
    */

    'api' => [
        // Source Options: api, database
        'source' => 'api',
        'uri' => 'api.fantasy.nfl.com/v1',
    ],

];
