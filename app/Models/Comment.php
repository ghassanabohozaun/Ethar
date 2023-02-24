<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'partners';
    protected $fillable = [
        'person_ip',
        'person_name',
        'person_email',
        'commentary',
        'status',
        'post_id',
        'photo',
        'gender'
    ];
    protected $hidden = ['updated_at'];

}
