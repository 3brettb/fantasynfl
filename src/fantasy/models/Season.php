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
    protected $fillable = ['league_id', 'year', 'standings', 'postseason', 'money'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'standings' => 'array',
        'postseason' => 'array',
        'playoffs' => 'array',
        'offseason' => 'array',
        'money' => 'array',
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

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }

    public function weeks()
    {
        return $this->hasMany(Week::class);
    }

    public function league()
    {
        return $this->belongsTo(League::class);
    }

}