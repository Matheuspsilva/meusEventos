@extends('layouts.layout')

@section('title') Eventos @endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <h2>Eventos</h2>
        <hr>

    </div>
</div>

<div class="row mb-4">

        @forelse ( $events as $event )

            <div class="col-md-4">

                <div class="card">
                    <img src="https://via.placeholder.com/150" alt="" class="card-img-top">

                    <div class="card-body">
                        <h5 class="card-title">{{$event->title}}</h5>

                        <strong>Acontece em: {{$event->start_event->format('d/m/Y H:i:s')}}</strong>

                        <p class="card-text">{{$event->description}}</p>

                        <a href="/eventos/{{$event->slug}}" class="btn btn-default">Ver evento</a>

                    </div>

                </div>

            </div>
            @if (($loop->iteration % 3) == 0) </div> <div class="row mb-4"> @endif
        @empty

            <div class="col-md-12">
                <div class="alert alert-warning">Nenhum evento encontrado</div>
            </div>

        @endforelse

</div>

@endsection
