<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(10);

        return view('admin.events.index')->with('events', $events) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Atribuição Massa ou Mass Assignment
        // $event = [
        //     'title' => 'Evento Atribuição em Massa' , rand(1,100),
        //     'description' => 'Descrição...',
        //     'body' => 'Conteúdo do evento',
        //     'slug' => 'evento-atribuicao-em-massa',
        //     'start_event' => date('Y-m-d H:i:s'),
        // ];

        // return Event::create($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  // Mass Update ou Atualização em Massa
        // $eventData = [
        //     'title' => 'dasdasdasdasdasdadasasdasd' . rand(1,100)
        //     // 'description' => 'Descrição atualizada...',
        //     // 'body' => 'Conteúdo do evento atualizado com atualização em massa',
        //     // 'slug' => 'evento-atribuicao-em-massa',
        //     // 'start_event' => date('Y-m-d H:i:s'),
        // ];

        // $event = \App\Models\Event::find($id);
        // $event->update($eventData);
        // return $event;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = \App\Models\Event::findOrFail($id);
        return $event->delete();
    }
}
