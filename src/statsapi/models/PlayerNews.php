<?php

namespace Fantasy\NFL\StatsAPI\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerNews extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_stats_player_news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['playerId', 'timestamp', 'source', 'headline', 'body', 'analysis'];

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