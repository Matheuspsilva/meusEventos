@extends('layouts.app')

@section('title')Editar Evento - @endsection

@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-items-center my-5">
        <h2>Editar Evento</h2>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <form action="{{ route('events.update', $event)}}" method="post" >
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="">Título Evento</label>
                <input type="text" class="form-control" name="title" value="{{$event->title}}">
            </div>

            <div class="form-group">
                <label for="">Descrição Evento</label>
                <input type="text" class="form-control" name="description" value="{{$event->description}}">

            </div>

            <div class="form-group">
                <label for="">Fale mais Sobre o evento</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$event->body}}</textarea>

            </div>

            <div class="form-group">
                <label for="">Quando acontecerá</label>
                <input type="text" class="form-control" name="start_event" value="{{$event->start_event}}">
            </div>

            <button type="submit" class="btn btn-lg btn-success">Atualizar Evento</button>

        </form>

    </div>
</div>


@endsection
