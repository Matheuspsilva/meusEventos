@extends('layouts.app')

@section('title')Meus Eventos @endsection

@section('content')

<div class="row">
    <div class="col-12 d-flex justify-content-between align-items-center my-5">
        <h2>Meus Eventos</h2>
        <a href="{{ route('events.create') }}" class="btn btn-success">Criar Evento</a>
    </div>
    <div class="col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Evento</th>
                    <th>Criado Em</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)

                <tr>
                    <td>{{$event->id}}</td>

                    <td>{{$event->title}}</td>

                    <td>{{$event->created_at->format('d/m/Y H:i:s')}}</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="3"> Nenhum evento encontrado</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        {{$events->links()}}

    </div>
</div>



@endsection
