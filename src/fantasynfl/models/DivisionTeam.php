<?php

namespace Fantasy\NFL\FantasyNFL\Models;

use Illuminate\Database\Eloquent\Model;

class DivisionTeam extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_division_teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['division_id', 'team_id'];

    // relations here

}