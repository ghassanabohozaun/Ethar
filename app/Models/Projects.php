<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use HasFactory  , SoftDeletes;

    protected $fillable = [
        'id',	'title_ar',	'title_en',
        'details_ar',	'details_en',	'status',
        'photo',	'language',	'file',
        'date',	'writer',	'type',
    ];

    public function getTypeAttribute($value){
        if(Lang() == 'ar'){
            if($value =='previous' ){
                return 'السابق';
            }else{
                return 'الحالي ';
            }
        }else{
            return $value;
        }
    }

}
