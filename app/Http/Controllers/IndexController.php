<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function pages($slug){
     $page = Page::with('menu')->whereSlug($slug)->firstOrFail();
     return view('visitors.menu-details',compact('page'));
    }
}
