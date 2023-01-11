<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $table = "articles";
    protected $fillable = [
        'photo', 'language', 'title_ar', 'title_en', 'abstract_ar', 'abstract_en', 'publish_date', 'publisher_name', 'status',
    ];
    protected $hidden = ['updated_at'];
    //////////////////////////////////////////////////////////////
    /// language accessors
    public function getLanguageAttribute($value)
    {
        if ($value == 'ar') {
            return trans('general.ar');
        } elseif ($value == 'ar_en') {
            return trans('general.ar_en');
        }
    }
}
