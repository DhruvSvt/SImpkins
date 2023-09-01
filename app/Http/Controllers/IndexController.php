<?php

namespace App\Http\Controllers;

use App\Models\EventNotice;
use App\Models\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $events = EventNotice::whereType('EVENT')->get();
        $notices = EventNotice::whereType('NOTICE')->get();

        return view('visitors.index', compact('events', 'notices'));
    }

    public function pages($slug){
     $page = Page::with('menu')->whereSlug($slug)->firstOrFail();
     return view('visitors.menu-details',compact('page'));
    }
}
