<?php

namespace Fantasy\NFL\Fantasy\Models;

use Fantasy\NFL\Enums\UserStatus;
use Illuminate\Notifications\Notifiable;
use Fantasy\NFL\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first', 'last', 'email', 'team_id', 'status'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['password', 'remember_token'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $model->status = UserStatus::OFFLINE;
        });
    }

    // relations here

}