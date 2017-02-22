<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function home()
    {
    	return view('admin.pages.home');
    }

    public function settings()
    {
    	return view('admin.pages.settings');
    }

    public function aboutme()
    {
        $aboutme = \App\Post::slug("hakkimda")->first();
    	return view('admin.pages.aboutme', compact('aboutme'));
    }
}
