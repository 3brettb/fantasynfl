<?php

namespace Fantasy\NFL\Fantasy\Models;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_rosters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['week_id', 'team_id'];

    // relations here

}