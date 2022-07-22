<?php

namespace App\Modules\Globalsetting\Models {


    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;

    class Company extends model
    {
        protected $table = 'settings';

        protected $fillable = [
            'header_bg_image',
            'organisation_name',
            'organisation_logo_1',
            'organisation_logo_2',
            'contact_number_1',
            'contact_number_2',
            'fax_number_1',
            'fax_number_2',
            'email_1',
            'email_2',
            'address_en',
            'address_np',

            'facebook_url',
            'tweeter_url',
            'instagram_url',
            'copyright',



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
            'created_by_id'
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