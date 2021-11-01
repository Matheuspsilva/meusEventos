<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $event;

    public function __construct(Event $event){
        $this->event = $event;
    }

    public function index(){

        $events = $this->event->orderBy('start_event', 'DESC')->paginate(15);
        return view('home')->with('events', $events );
    }

    public function show($slug){

        $event = $this->event->where('slug', $slug)->first();
        return view('event')->with('event', $event);

    }
}
