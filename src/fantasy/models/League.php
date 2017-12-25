<?php

namespace Fantasy\NFL\Fantasy\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_leagues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'week_id'];

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

    public function getSeasonAttribute()
    {
        return $this->week()->season;
    }

    public function getCurrentWeekAttribute()
    {
        return $this->week;
    }

    public function getActivityAttribute()
    {
        // TODO: implement getActivityAttribute() method.
    }

    public function getDivisionsAttribute()
    {
        return $this->season->divisions;
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function weeks()
    {
        return $this->hasManyThrough(Week::class, 'fantasy_seasons', 'league_id', 'season_id');
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }

}