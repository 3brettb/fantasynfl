<?php

namespace Fantasy\NFL\FantasyNFL\Models;

use Illuminate\Database\Eloquent\Model;

class DraftPick extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_draft_picks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['draft_id', 'team_id', 'owner_id', 'player_id', 'round', 'order', 'overall', 'type'];

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

}