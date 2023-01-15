<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;

    protected $table = 'teams';
    protected $fillable = [
        'photo',
        'status',
        'name_ar',
        'name_en',
        'position_ar',
        'position_en',
    ];
    protected $hidden = ['updated_at'];
}
