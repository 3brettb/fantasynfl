<?php

namespace Fantasy\NFL\FantasyNFL\Models;

use Fantasy\NFL\Enums\RankingType;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_weeks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['season_id', 'number', 'nflweek', 'type'];

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

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function rankings()
    {
        return $this->hasMany(Ranking::class);
    }

    public function official_rankings()
    {
        return $this->rankings()->where('type', RankingType::OFFICIAL)->first();
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

}