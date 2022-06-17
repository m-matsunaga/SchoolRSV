<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RsvFrame extends Model
{
    protected $table = 'rsv_frames';

    protected $fillable = [
        'rsv_frame',
    ];

    public function Reserve(){
      return $this->hasMany('App\Reserve');
    }

    public function RsvFrameCount(){
      return $this->hasMany('App\RsvFrameCount');
    }
}
