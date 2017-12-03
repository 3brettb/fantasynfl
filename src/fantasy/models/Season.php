<?php

namespace Fantasy\NFL\Fantasy\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_seasons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['league_id', 'year', 'standings'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'standings' => 'array',
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