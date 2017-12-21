<?php

namespace App\Http\Controllers\Progress;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function profile()
    {
        return view('progress-app.profile');
    }
}
