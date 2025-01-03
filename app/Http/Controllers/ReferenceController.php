<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    public function index()
    {
        $references = Reference::all();
        return view('references.index', compact('references'));
    }


    public function create()
    {
        return view('references.create');
    }


    public function store(Request $request)
    {
        // Gelen veriyi validate et
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'relationship' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);


        Reference::create($validated);


        return redirect()->route('references.index')->with('success', 'Referans başarıyla eklendi!');
    }

    public function edit($id)
    {
        $reference = Reference::find($id);
        if (!$reference) {
            return redirect()->route('references.index')->with('error', 'Referans bulunamadı!');
        }

        return view('references.edit', compact('reference'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'relationship' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        $reference = Reference::find($id);
        if (!$reference) {
            return redirect()->route('references.index')->with('error', 'Referans bulunamadı!');
        }

        $reference->update($validated);

        return redirect()->route('references.index')->with('success', 'Referans başarıyla güncellendi!');
    }

    public function destroy($id)
    {
        $reference = Reference::find($id);
        if (!$reference) {
            return redirect()->route('references.index')->with('error', 'Referans bulunamadı!');
        }

        $reference->delete();

        return redirect()->route('references.index')->with('success', 'Referans başarıyla silindi!');
    }
}
