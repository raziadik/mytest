<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return void
     */
    public function index()
    {
		$profile = Profile::find(Auth::user()->profile->id);
        $url = '/edit/' . $profile->id;

        return redirect($url);
    }
}
