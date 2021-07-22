@extends('layouts.main')

@section('content')
{{-- @if ($errors->any())   
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach            
            </ul>
        </div> 
    @endif --}}

    <h1>Modifica della birra: {{ $beer->brand }} {{ $beer->name }}</h1>
    <a href="{{ route('beers.show', $beer->id) }}" class="btn btn-primary">Visualizza</a>

    <form action="{{ route('beers.update', $beer->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" class="form-control @error('brand') is-invalid @enderror @error('slug') is-invalid @enderror" id="brand" placeholder="Inserisci la marca della birra" name="brand" value="{{ old('brand', $beer->brand) }}">
            @error('brand')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
            @error('slug')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror @error('slug') is-invalid @enderror" id="name" placeholder="Inserisci il nome della birra" name="name" value="{{ old('name', $beer->name) }}">
            @error('name')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
            @error('slug')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="alcohol">Gradazione alcolica</label>
            <input type="number" step="0.1" class="form-control @error('alcohol') is-invalid @enderror" id="alcohol" placeholder="Inserisci la gradazione alcolica della birra" name="alcohol"  value="{{ old('alcohol', $beer->alcohol) }}">
            @error('alcohol')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Inserisci il prezzo della birra" name="price" value="{{ old('price', $beer->price) }}">
            @error('price')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="img">Url Immagine</label>
            <input type="text" class="form-control @error('img') is-invalid @enderror" id="img" placeholder="Inserisci l'url dell'immagine" name="img" value="{{ old('img', $beer->img) }}">
            @error('img')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Descrizione della birra</label>
            <textarea 
                class="form-control @error('description') is-invalid @enderror" 
                id="description" 
                name="description" 
                placeholder="Inserisci la descrizione della birra" rows="4">{{ old('description', $beer->description) }}</textarea>
                @error('description')        
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <a href="{{ route('beers.index') }}" class="btn btn-secondary">Elenco birre</a>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection    