<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;

    protected $table = 'sliders';
    protected $fillable = [
        'title_ar', 'title_en', 'details_ar', 'details_en', 'order', 'status', 'details_status',
        'button_status', 'url_ar', 'url_en', 'photo', 'status', 'language',
    ];
    protected $hidden = ['updated_at'];


    //////////////////////////////////////////////////////////////
    // accessors
    // language
    public function getLanguageAttribute($value)
    {
        if ($value == 'ar') {
            return trans('general.ar');
        } elseif ($value == 'ar_en') {
            return trans('general.ar_en');

        }
    }

    // Details Status
    public function getDetailsStatusAttribute($value)
    {
        if ($value == 'show') {
            return trans('sliders.show');
        } elseif ($value == 'hide') {
            return trans('sliders.hide');
        }
    }

    // Button Status
    public function getButtonStatusAttribute($value)
    {
        if ($value == 'show') {
            return trans('sliders.show');
        } elseif ($value == 'hide') {
            return trans('sliders.hide');
        }
    }

}
