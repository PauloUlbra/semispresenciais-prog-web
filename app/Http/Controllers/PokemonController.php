<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Contracts\Service\Attribute\Required;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemon = Pokemon::all();
        return view('pokemon.index', compact('pokemon'));
    }

    public function create()
    {
        if(!Gate::authorize('create', Pokemon::class))
        {
            return redirect('pokemon');
        }

        $trainers = Trainer::all();
        return view('pokemon.create', compact('trainers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'power' => 'required',
            'health' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $pokemon = new Pokemon();
        $pokemon->name = $request->name;
        $pokemon->type = $request->type;
        $pokemon->power = $request->power;
        $pokemon->health = $request->health;
        $pokemon->image = 'images/'.$imageName;
        $pokemon->trainer_id = $request->trainer_id;
        $pokemon->save();
        return redirect('pokemon')->with('success', 'Pokémon created successfully.');

    }

    public function edit($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $trainers = Trainer::all();
        return view('pokemon.edit', compact('pokemon', 'trainers'));
    }

    public function update(Request $request, $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->update($request->all());
        $pokemon->name = $request->name;
        $pokemon->type = $request->type;
        $pokemon->power = $request->power;
        $pokemon->health = $request->health;
        $pokemon->trainer_id = $request->trainer_id;

        if(!is_null($request->image)) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $pokemon->image = 'images/'.$imageName;
        }
        $pokemon->save();
        return redirect('pokemon')->with('success', 'Pokémon updated successfully.');
    }

    public function destroy($id)
    {
        $product = Pokemon::findOrFail($id);
        $product->delete();
        return redirect('pokemon')->with('success', 'Pokémon deleted successfully.');
    }
}
