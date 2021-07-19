<?php

use Illuminate\Database\Seeder;
use App\Beer;
use Illuminate\Support\Str;

class BeersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beers = config("beer");

        foreach($beers as $beer) {
            // creazione istanza
            $newBeer = new Beer();
            // valorizzazione proprietà
            $newBeer->brand = $beer["brand"]; 
            $newBeer->name = $beer["name"]; 
            $newBeer->alcohol = $beer["alcohol"]; 
            $newBeer->price = $beer["price"]; 
            $newBeer->img = $beer["img"]; 
            $newBeer->description = $beer["description"];
            // creazione slug
            $slug = $beer["brand"] . " " . $beer["name"];
            $newBeer->slug = Str::slug($slug, '-');
            // salvataggio oggetto
            $newBeer->save();
        }
        
    }
}
