<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function pages($slug){
        return $page = Page::whereSlug($slug)->firstOrFail();
    }
}