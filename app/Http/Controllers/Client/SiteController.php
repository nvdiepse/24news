<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        return view('client.home');
    }

    public function shop(Request $request)
    {
        return view('client.shop');
    }
    
    public function contact(Request $request)
    {
        return view('client.contact');
    }

    public function blog(Request $request)
    {
        return view('client.blog');
    }

}
