@extends('layouts.app')

@section('content')

<div class="row mt-5">
    <div class="col-12">
        <form action="{{ route('admin.events.photos.store', $event)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Enviar fotos do evento</label>
                <input type="file" name="photos[]" class="form-control @error('photos.*') is-invalid @enderror" multiple>

                @error('photos.*')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror

            </div>
            @dump($event->photos)

            <button class="btn btn-lg btn-success" type="submit">Enviar fotos</button>
        </form>
        <hr>
    </div>
</div>

@endsection
