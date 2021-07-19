@extends('layouts.main')

@section('content')
    <h1>Elenco birre</h1>

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
                        <a href="{{ route("beers.show", $item->id) }}" class="btn btn-success">SHOW</a>
                    </td>
                    <td>EDIT</td>
                    <td>DELETE</td>
                </tr> 
            @endforeach
        </tbody>
    </table>

    {{ $beers->links() }}
@endsection