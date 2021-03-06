<?php

namespace Fantasy\NFL\Fantasy\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_rankings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'week_id', 'type', 'data'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'json_data',
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

}