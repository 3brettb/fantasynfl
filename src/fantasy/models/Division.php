<?php

namespace Fantasy\NFL\Fantasy\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_divisions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['season_id', 'name', 'standings'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'standings' => 'json_data',
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

    public function getLeagueAttribute()
    {
        return $this->season->league;
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'fantasy_division_teams');
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

}