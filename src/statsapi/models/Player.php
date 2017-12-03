<?php

namespace Fantasy\NFL\StatsAPI\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_stats_players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'esbid', 'gsisPlayerId', 'name', 'firstName', 'lastName', 'teamAbbr', 'position'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){
            if($model->name == null || $model->name == "")
            {
                $model->name = $model->firstName." ".$model->lastName;
            }
        });
    }

    // relations here

}