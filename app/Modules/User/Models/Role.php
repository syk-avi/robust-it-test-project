<?php

namespace App\Modules\User\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sort_order',
        'status',
        'created_by_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function permission()
    {
        return $this->hasMany(Permission::class);
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
