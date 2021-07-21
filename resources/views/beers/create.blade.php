@extends('layouts.main')

@section('content')
    <h1>Crea una nuova birra</h1>

    <form action="{{ route('beers.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" class="form-control" id="brand" placeholder="Inserisci la marca della birra" name="brand">
        </div>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" placeholder="Inserisci il nome della birra" name="name">
        </div>
        <div class="form-group">
            <label for="alcohol">Gradazione alcolica</label>
            <input type="number" step="0.1" class="form-control" id="alcohol" placeholder="Inserisci la gradazione alcolica della birra" name="alcohol">
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" step="0.01" class="form-control" id="price" placeholder="Inserisci il prezzo della birra" name="price">
        </div>
        <div class="form-group">
            <label for="img">Url Immagine</label>
            <input type="text" class="form-control" id="img" placeholder="Inserisci l'url dell'immagine" name="img">
        </div>
        <div class="form-group">
            <label for="description">Descrizione della birra</label>
            <textarea class="form-control" id="description" name="description" placeholder="Inserisci la descrizione della birra" rows="4"></textarea>
          </div>
        <button type="submit" class="btn btn-primary">Salva</button>
      </form>
@endsection