<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RsvFrameCount extends Model
{
    protected $table = 'rsv_frame_counts';

    protected $fillable = [
        'date',
        'rsv_frame_id',
        'frame_count',
    ];

    public function RsvFrame(){
        return $this->belongsTo('App\RsvFrame');
    }
}
