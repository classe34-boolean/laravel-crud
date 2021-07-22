<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beer;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
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
        $beers = Beer::orderBy('id', 'DESC')->paginate(3);

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
        $slug = $request->get("brand") . " " . $request->get("name");

        $request->request->add(["slug" => Str::slug($slug, '-')]);
        $data = $request->all();

        // dd($data);
        
        // TODO: validazione
        $request->validate(
            [
                'brand' => 'required|max:20',
                'name' => 'required|max:40',
                'alcohol' => 'required|numeric|min:0|max:99.9',
                'price' => 'required|numeric|min:0.01|max:999.99',
                'img' => 'required|max:255',
                'description' => 'required|max:65535',
                'slug' => 'unique:beers'
            ],
            [
                'slug.unique' => 'The combination brand-name should be unique.',
                'required' => ':attribute is a mandatory field!'
            ]
        );

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
        $slug = $request->get("brand") . " " . $request->get("name");
        $request->request->add(["slug" => Str::slug($slug, '-')]);
        $data = $request->all();

        $request->validate(
            [
                'brand' => 'required|max:20',
                'name' => 'required|max:40',
                'alcohol' => 'required|numeric|min:0|max:99.9',
                'price' => 'required|numeric|min:0.01|max:999.99',
                'img' => 'required|max:255',
                'description' => 'required|max:65535',
                'slug' => [
                        Rule::unique('beers')->ignore($beer->id),
                    ]
            ],
            [
                'slug.unique' => 'The combination brand-name should be unique.',
                'required' => ':attribute is a mandatory field!'
            ]
        );
        // $beer = Beer::findOrFail($id);
        // TODO: validazione

        // $slug = $data["brand"] . " " . $data["name"];
        // $data["slug"] = Str::slug($slug, '-');        
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
    public function destroy(Request $request, Beer $beer)
    {
        // $beer = Beer::findOrFail($id);
        $beer->delete();
        // soluzione 1 per recuperare dato inviato con il form
        // dd($_POST["page"]);

        // soluzione 2 per recuperare dato inviato con il form, aggiungendo $request alla firma della destroy
        // dd($request->get('page'));

        return redirect()
            // ->route('beers.index', ['page' => $request->get('page')])
            ->route('beers.index')
            ->with('deleted', "Birra '" . $beer->brand . " " .$beer->name . "' cancellata correttamente");
    }
}
