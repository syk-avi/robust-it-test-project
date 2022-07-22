<?php

namespace App\Modules\User\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'route_name',
        'deleted_at',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDateString();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDateString();
    }
}
