<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
    protected $fillable = [
        'photo',
        'language',
        'slug_ar',
        'slug_en',
        'title_ar',
        'title_en',
        'abstract_ar',
        'abstract_en',
        'publish_date',
        'publisher_name',
        'status',
    ];
    protected $hidden = ['updated_at'];
    //////////////////////////////////////////////////////////////
    /// language accessors
    public function getLanguageAttribute($value)
    {
        if ($value == 'ar') {
            return trans('general.ar');

        } elseif ($value == 'en') {
            return trans('general.en');

        } elseif ($value == 'ar_en') {
            return trans('general.ar_en');
        }
    }
}
