<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beer;
use Illuminate\Support\Str;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $beers = Beer::all();
        // $beers = Beer::orderBy('id', 'DESC')->get();
        $beers = Beer::orderBy('id', 'DESC')->paginate(5);

        return view("beers.index", compact('beers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("beers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        // TODO: validazione

        // 1: creo nuova istanza
        $beer = new Beer();

        // 2a: assegnazione valori
        // $beer->brand = $data["brand"];
        // $beer->name = $data["name"];
        // $beer->alcohol = $data["alcohol"];
        // $beer->price = $data["price"];
        // $beer->img = $data["img"];
        // $beer->description = $data["description"];
        // $slug = $data["brand"] . " " . $data["name"];
        // $beer->slug = Str::slug($slug, '-');

        // 2b: Mass assignment
        $slug = $data["brand"] . " " . $data["name"];
        $data["slug"] = Str::slug($slug, '-');

        $beer->fill($data); // IMPORTANTE: per utilizzare il fill(), serve aggiungere $fillable al Model

        // 3: salvataggio istanza
        $beer->save();

        return redirect()
            ->route('beers.show', $beer->id)
            ->with('message', "Birra '" . $beer->brand . " " . $beer->name . "' creata correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Beer $beer)
    {
        // 1: find e abort
        // $beer = Beer::find($id);
        // if($beer) {
        //     return view("beers.show", compact('beer'));
        // }
        // abort(404, "Not Found");

        // 2: findOrFail
        // $beer = Beer::findOrFail($id);
        // return view("beers.show", compact('beer'));

        // 3: ricerca per slug
        // $beer = Beer::where('slug', $slug)->firstOrFail();

        // 3b: ricerca per slug senza gestione eccezione
        // $beer = Beer::where('slug', $slug)->first();
        // if($beer) {
        //     return view("beers.show", compact('beer'));
        // }
        // abort(404, "Not Found");

        // 4: dependency injection, Laravel per noi sta facendo:
        // $beer = Beer::findOrFail($id);
        return view("beers.show", compact('beer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Beer $beer)
    {
        // $beer = Beer::findOrFail($id);

        return view("beers.edit", compact('beer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beer $beer)
    {
        $data = $request->all();

        // $beer = Beer::findOrFail($id);
        // TODO: validazione

        $slug = $data["brand"] . " " . $data["name"];
        $data["slug"] = Str::slug($slug, '-');        
        $beer->update($data); // ricordarsi di aggiungere il $fillable al Model
        
        return redirect()
            ->route('beers.show', $beer->id)
            ->with('message', "Birra '" . $beer->brand . " " . $beer->name . "' modificata correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beer $beer)
    {
        // $beer = Beer::findOrFail($id);
        $beer->delete();

        return redirect()
            ->route('beers.index')
            ->with('deleted', "Birra '" . $beer->brand . " " .$beer->name . "' cancellata correttamente");
    }
}
