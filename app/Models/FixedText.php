<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class FixedText extends Model
{

    protected $table = 'fixed_texts';
    protected $fillable = [
        'project_details_ar', 'project_details_en',
    ];
    protected $hidden = ['created_at', 'updated_at'];
}
