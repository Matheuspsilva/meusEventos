<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventPhotoRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        return view('admin.events.photos', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\EventPhotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventPhotoRequest $request,Event $event)
    {
        $photos = $request->file('photos');

        $uploadedPhotos = [];

        //Iterar fotos e realizar upload
        foreach ($photos as $photo) {
            $uploadedPhotos[] = ['photo' => $photo->store('events/photos', 'public')];
        }

        //Salvar referências para evento
        $event->photos()->createMany($uploadedPhotos);

        return redirect()->back();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
