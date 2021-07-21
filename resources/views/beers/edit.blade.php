@extends('layouts.main')

@section('content')
    <h1>Modifica della birra: {{ $beer->brand }} {{ $beer->name }}</h1>
    <a href="{{ route('beers.show', $beer->id) }}" class="btn btn-primary">Visualizza</a>

    <form action="{{ route('beers.update', $beer->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" class="form-control" id="brand" placeholder="Inserisci la marca della birra" name="brand" value="{{ $beer->brand }}">
        </div>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Inserisci il nome della birra" name="name" value="{{ $beer->name }}">
        </div>
        <div class="form-group">
            <label for="alcohol">Gradazione alcolica</label>
            <input type="number" step="0.1" class="form-control" id="alcohol" placeholder="Inserisci la gradazione alcolica della birra" name="alcohol"  value="{{ $beer->alcohol }}">
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" step="0.01" class="form-control" id="price" placeholder="Inserisci il prezzo della birra" name="price" value="{{ $beer->price }}">
        </div>
        <div class="form-group">
            <label for="img">Url Immagine</label>
            <input type="text" class="form-control" id="img" placeholder="Inserisci l'url dell'immagine" name="img" value="{{ $beer->img }}">
        </div>
        <div class="form-group">
            <label for="description">Descrizione della birra</label>
            <textarea 
                class="form-control" 
                id="description" 
                name="description" 
                placeholder="Inserisci la descrizione della birra" rows="4">{{ $beer->description }}</textarea>
        </div>
        <a href="{{ route('beers.index') }}" class="btn btn-secondary">Elenco birre</a>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection    