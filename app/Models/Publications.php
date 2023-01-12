<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publications extends Model
{
    use HasFactory,  SoftDeletes;

    protected $fillable = [
        'id', 'title_ar', 'title_en', 'details_ar', 'details_en', 'status',
        'photo', 'language', 'file', 'date', 'writer', 'type',
    ];

    public function getTypeAttribute($value)
    {
        if (Lang() == 'ar') {
            if ($value == 'Advertisements') {
                return 'الإعلانات';
            } elseif($value == 'Brochures') {
                return 'نشرة ';
            } elseif($value == 'CaseStudy') {
                return 'دراسة الحالة ';
            }elseif($value == 'ScientificArticles') {
                return 'مقالات علمية';
            }
        } else {
            if ($value == 'Advertisements') {
                return 'Advertisements';
            } elseif($value == 'Brochures') {
                return 'Brochures ';
            } elseif($value == 'CaseStudy') {
                return 'Case Study';
            }elseif($value == 'ScientificArticles') {
                return 'Scientific Articles';
            }
        }
    }
}
