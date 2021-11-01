<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $event;

    public function __construct(Event $event){
        $this->event = $event;
    }

    public function index(){

        $byCategory = request()->has('category')
            ? Category::whereSlug(request()->get('category'))->first()->events()
            : null;

        $events = $this->event->getEventsHome($byCategory)->paginate(15);

        $categories = Category::all(['name', 'slug']);

        return view('home', compact('events', 'categories'));
    }

    public function show($slug){

        $event = $this->event->where('slug', $slug)->first();
        return view('event')->with('event', $event);

    }
}
