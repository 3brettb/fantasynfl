<?php

namespace Fantasy\NFL\Fantasy\Models;

use Illuminate\Database\Eloquent\Model;

class LineupPlayer extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_lineup_players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['roster_id', 'player_id', 'projected', 'score', 'type', 'place'];

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