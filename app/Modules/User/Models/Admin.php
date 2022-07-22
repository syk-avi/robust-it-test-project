<?php

namespace App\Modules\User\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use  Notifiable;

     public static $role = [
        'customer' => 'customer',
        'vendor' => 'vendor',
        'admin' => 'admin',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'user_type',
        'first_name',
        'last_name',
        'status',
        'active',
        'last_active',
        'created_by_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    public static function adminType()
    {
        return [

            'user' => 'user',
            'admin' => 'admin',
        ];
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDateString();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDateString();
    }
}



