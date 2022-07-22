<?php

namespace App\Modules\Pages\Models {


    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Model;

    class Pages extends Model
    {
        protected $fillable = [
            'title',
            'slug',
            'caption',
            'intro_text',
            'detail',
            'page_type',
            'page_template',
            'parent_page_id',
            'file_name',
            'featured_image',
            'icon_image',
            'icon_image_caption',
            'page_title',
            'page_keyword',
            'page_description',
            'extra_one',
            'extra_two',
            'extra_three',
            'link',
            'sort_order',
            'status',
            'created_by_id',
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