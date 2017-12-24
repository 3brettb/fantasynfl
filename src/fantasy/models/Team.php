<?php

namespace Fantasy\NFL\Fantasy\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fantasy_teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['league_id', 'division_id', 'user_id', 'name', 'mascot', 'abbr', 'keepers', 'block'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'keepers' => 'array',
        'block' => 'array',
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

    public function getOwnerAttribute()
    {
        return $this->user;
    }

    public function getFullnameAttribute()
    {
        return $this->name.' '.$this->mascot;
    }

    public function league()
    {
        return $this->belongsTo(League::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trades()
    {
        return $this->belongsToMany(Trade::class, 'fantasy_trade_teams');
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function divisions()
    {
        return $this->belongsToMany(Division::class, 'fantasy_division_teams');
    }

}