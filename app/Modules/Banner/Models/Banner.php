<?php

namespace App\Modules\Banner\Models {

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;

    class Banner extends model
    {
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'title',
            'detail',
            'featured_image',
            'sort_order',
            'status',
            'created_by_id',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'status',
            'updated_at',
            'sort_order',
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
}