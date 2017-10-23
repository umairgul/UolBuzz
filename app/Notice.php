<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Notice extends Model
{
    protected $fillable = [
        'title','body','user_id','created_at','updated_at',
    ];
}
