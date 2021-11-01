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

        $events = $this->event->orderBy('start_event', 'DESC');

        // if($query = request()->query('search')){
        //     $events->where('title', 'LIKE', '%' . $query . '%');
        // }

        // Laravel queryBuilder
        $events->when($search = request()->query('search'), function ($queryBuilder) use($search){
            return $queryBuilder->where('title', 'LIKE', '%' . $search . '%');
        });

        $events = $events->paginate(15);

        return view('home')->with('events', $events );
    }

    public function show($slug){

        $event = $this->event->where('slug', $slug)->first();
        return view('event')->with('event', $event);

    }
}
