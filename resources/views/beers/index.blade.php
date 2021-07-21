@extends('layouts.main')

@section('content')
    <h1>Elenco birre</h1>

    @if (session('deleted'))
        <div class="alert alert-success">
            {{ session('deleted') }}
        </div>
    @endif

    <table class="mt-4 table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Nome</th>
                <th colspan="3">Azioni</th>
            </tr>    
        </thead>
        <tbody>  
            @foreach ($beers as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route("beers.show", $item->id) }}" class="btn btn-success">
                            SHOW
                        </a>
                    </td>
                    <td>
                        <a href="{{ route("beers.edit", $item->id) }}" class="btn btn-primary">
                            EDIT
                        </a>
                    </td>
                    <td>
                        <form 
                            action="{{ route('beers.destroy', $item->id) }}" 
                            method="POST"
                            onSubmit = "return confirm('Sei sicuro di voler cancellare definitivamente {{ $item->brand }} {{ $item->name }}?')"
                            >
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="DELETE">
                        </form>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>

    {{ $beers->links() }}
@endsection