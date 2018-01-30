<?php

namespace Fantasy\NFL\FantasyNFL\Models;

use Illuminate\Database\Eloquent\Model;

class RosterPlayer extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_roster_players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['team_id', 'player_id'];

    // relations here

}