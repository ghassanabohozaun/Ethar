<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'status' , 'type' , 'file' ,'year'
    ];

    public function getTypeAttribute($value)
    {
        if (Lang() == 'ar') {
            if ($value == 'Financial') {
                return 'مالي';
            } elseif($value == 'Administrative') {
                return 'اداري ';
            }
        }

        return $value;

    }
}
