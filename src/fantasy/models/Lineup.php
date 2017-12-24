<?php

namespace Fantasy\NFL\Fantasy\Models;

use Illuminate\Database\Eloquent\Model;

class Lineup extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_lineups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['week_id', 'team_id'];

    // relations here

    public function players()
    {
        return $this->hasMany(LineupPlayer::class);
    }

}