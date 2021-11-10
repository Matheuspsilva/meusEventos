<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function start(Event $event)
    {
        session()->put('enrollment', $event->id);

        return redirect()->route('enrollment.confirm');
    }

    public function confirm()
    {

        if(!session()->has('enrollment')) return redirect('home');

        $event = Event::find(session('enrollment'));

        return view('enrollment-confirm', compact('event'));
    }

    public function process()
    {

        if(!session()->has('enrollment')) return redirect('home');

        $event = Event::find(session('enrollment'));
        $event->enrolleds()->attach([
            auth()->id() =>[
                'reference' => uniqid(),
                'status' => 'active'
            ]
        ]);

        // $event->enrolleds()->attach(auth()->id(),['reference' => uniqid(),'status' => 'active']);

        session()->forget('enrollment');

        return redirect()->route('events.single', $event->slug);

    }

}
