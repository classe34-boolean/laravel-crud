@extends('layouts.main')

@section('content')
    @if (session('message'))
        <div class="alert alert-success mb-4">
            {{ session('message') }}
        </div>
    @endif

    <h1>{{ $beer->brand }} {{ $beer->name }}</h1>
    <a href="{{ route('beers.edit', $beer->id) }}" class="btn btn-primary">Modifica</a>

    <div class="row my-4">
        <div class="col-2">
            <img class="img-fluid" src="{{ $beer->img }}" alt="{{ $beer->brand . " " . $beer->name }}">
        </div>
        <div class="col-10">
            <h4>Gradazione alcolica</h4>
            <p>{{ $beer->alcohol }} &deg;</p>
            <h4>Prezzo</h4>
            <p>{{ $beer->price }} &euro;</p>
            <h4>Descrizione</h4>
            <p>{{ $beer->description }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a class="btn btn-primary" href="{{ route("beers.index") }}">Torna all'elenco</a>
    </div>
@endsection