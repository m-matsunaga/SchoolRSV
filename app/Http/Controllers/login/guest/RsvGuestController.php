<?php

namespace App\Http\Controllers\login\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RsvGuestController extends Controller
{
   public function rsvCancel($id){

    $deleteRsvData = \App\Reserve::where('id', $id)
                    ->first();

    DB::transaction(function () use($deleteRsvData, $id) {
    \App\RsvFrameCount::where('date', $deleteRsvData->rsv_date)
                        ->where('rsv_frame_id', $deleteRsvData->rsv_frame_id)
                        ->increment('frame_count');

    \App\Reserve::
        where('id', $id)
        ->delete();
    });

        return redirect('/guest/home');
}

   public function reservation(Request $request){

        $id = Auth::id();
        $rsv_frames = $request->rsv_frame;

    foreach($rsv_frames as $date_key => $value){

        if ($value) {

            DB::transaction(function () use($id, $date_key, $value) {
                \App\Reserve::insert([
                    'user_id' => $id,
                    'rsv_date' => $date_key,
                    'rsv_frame_id' => $value,
                ]);

                \App\RsvFrameCount::where('date', $date_key)
                                    ->where('rsv_frame_id', $value)
                                    ->decrement('frame_count');
            });
        }
    }
        return redirect('/guest/home');
    }
}
