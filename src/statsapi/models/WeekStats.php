<?php

namespace Fantasy\NFL\StatsAPI\Models;

use Illuminate\Database\Eloquent\Model;

class WeekStats extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_stats_player_weekstats';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['playerId', 'season', 'data'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        //
    }

    // relations here

}