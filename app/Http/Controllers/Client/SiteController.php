<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        return view('client.home',[
            'title'=> __('meta.title'),
            'keywords'=> __('meta.keywords'),
            'description'=> __('meta.description'),
            'robots'=> __('meta.robots'),
            'author'=> __('meta.author'),
            'url'=> __('meta.url'),
            'og_image'=> __('meta.og_image'),
            'rating'=> __('meta.rating'),
            'og_image'=>'https://via.placeholder.com/200x200',
            'og_description'=> __('meta.description'),
            'og_type”'=> __('meta.type”'),
            'og_locale'=> __('meta.locale'),
            'og_sitename'=> __('meta.sitename'),
            'og_image'=> __('meta.image'),
            'og_url'=> __('meta.url'),
        ]);
    }

    public function contact(Request $request)
    {
        return view('client.contact',[
            'title'=> __('meta.title'),
            'keywords'=> __('meta.keywords'),
            'description'=> __('meta.description'),
            'robots'=> __('meta.robots'),
            'author'=> __('meta.author'),
            'url'=> __('meta.url'),
            'og_image'=> __('meta.og_image'),
            'rating'=> __('meta.rating'),
            'og_image'=>'https://via.placeholder.com/200x200',
            'og_description'=> __('meta.description'),
            'og_type”'=> __('meta.type”'),
            'og_locale'=> __('meta.locale'),
            'og_sitename'=> __('meta.sitename'),
            'og_image'=> __('meta.image'),
            'og_url'=> __('meta.url'),
        ]);
    }

    public function blog(Request $request)
    {
        return view('client.blog',[
            'title'=> __('meta.title'),
            'keywords'=> __('meta.keywords'),
            'description'=> __('meta.description'),
            'robots'=> __('meta.robots'),
            'author'=> __('meta.author'),
            'url'=> __('meta.url'),
            'og_image'=> __('meta.og_image'),
            'rating'=> __('meta.rating'),
            'og_image'=>'https://via.placeholder.com/200x200',
            'og_description'=> __('meta.description'),
            'og_type”'=> __('meta.type”'),
            'og_locale'=> __('meta.locale'),
            'og_sitename'=> __('meta.sitename'),
            'og_image'=> __('meta.image'),
            'og_url'=> __('meta.url'),
        ]);
    }
}
