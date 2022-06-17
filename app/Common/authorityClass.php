<?php

namespace app\Common;

use Illuminate\Support\Facades\Auth;

class authorityClass
{
    public static function authority_judge($user) {
    {
        return \App\User::where('id', $user->id)->select('admin_role')->first();
    }
}
}
