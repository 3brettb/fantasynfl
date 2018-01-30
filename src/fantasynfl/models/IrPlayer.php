<?php

namespace Fantasy\NFL\FantasyNFL\Models;

use Illuminate\Database\Eloquent\Model;

class IrPlayer extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_ir_players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['league_id', 'player_id'];

    // relations here

}