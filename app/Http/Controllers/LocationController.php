<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {

        $locations = Location::all();

        return view('locations.index', compact('locations'));
    }

    public function create()
    {

        return view('locations.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Location::create([
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('locations.index')->with('success', 'Konum başarıyla eklendi.');
    }

    public function edit($id)
    {
         $location = Location::findOrFail($id);

        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);


        $location->update([
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);


        return redirect()->route('locations.index')->with('success', 'Konum başarıyla güncellendi.');
    }


    public function destroy($id)
    {
       $location = Location::findOrFail($id);
       $location->delete();

        return redirect()->route('locations.index')->with('success', 'Konum başarıyla silindi.');
    }
}
