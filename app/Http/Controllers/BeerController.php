<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beer;

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
        $beers = Beer::paginate(3);

        return view("beers.index", compact('beers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
