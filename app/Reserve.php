<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $table = 'reserves';

    protected $fillable = [
        'user_id',
        'rsv-date',
        'rsv_frame_id',
        'attendance',
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function RsvFrame(){
        return $this->belongsTo('App\RsvFrame');
    }
}
