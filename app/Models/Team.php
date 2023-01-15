<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [
        'name_ar',
        'name_en',
        'position_ar',
        'position_en',
        'photo',
    ];
    protected $hidden = ['updated_at'];
}
