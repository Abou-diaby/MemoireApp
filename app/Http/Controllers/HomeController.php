<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersPhoneNumber;
use Twilio\Rest\Client;

class HomeController extends Controller
{
    //La page/vue home.blade.php
    public function home()
    {
        return view('home.home');
    }

    //La page/vue about.blade.php
    public function about()
    {
        return view('home.about');
    }

    //la page/vue dashboard.blade.php
    public function dashboard()
    {
        return view('home.dashboard');
    }

}
