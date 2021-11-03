<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    private $event;

    public function __construct(Event $event)
    {
        $this->event = $event;

        $this->middleware('user.can.edit.event')->only(['edit', 'update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = auth()->user()->events()->paginate(15);

        return view('admin.events.index')->with('events', $events) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\EventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {

        $event = $request->all();

        if($banner = $request->file('banner')) {
            $event['banner'] = $banner->store('banner', 'public');
        }

        $event = $this->event->create($event);
        $event->owner()->associate(auth()->user());
        $event->save();

        return redirect()->to(route('admin.events.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($event)
    {
        return 'Evento' . $event;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($event)
    {
        $event = $this->event->findOrFail($event);

        return view('admin.events.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\EventRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $event)
    {

        $event = $this->event->findOrFail($event);
        $event->update($request->all());

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($event)
    {
        $event = $this->event->findOrFail($event);
        $event->delete();

        return redirect()->to(route('admin.events.index'));
    }
}
