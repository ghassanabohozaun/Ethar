<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;

    protected $table = 'partners';
    protected $fillable = [
        'photo',
        'name_ar',
        'name_en',
        'url',
        'status',
    ];
    protected $hidden = ['updated_at'];

}
