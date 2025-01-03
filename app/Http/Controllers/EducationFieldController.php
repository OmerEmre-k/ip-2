<?php

namespace App\Http\Controllers;

use App\Models\EducationField;
use Illuminate\Http\Request;

class EducationFieldController extends Controller
{
    public function index()
    {
        $fields = EducationField::all();
        return view('educationFields.index', compact('fields'));
    }

    public function create()
    {
        return view('educationFields.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        EducationField::create($validated);

        return redirect()->route('educationFields.index')->with('success', 'Eğitim alanı başarıyla eklendi!');
    }


    public function edit($id)
    {
        $field = EducationField::find($id);
        return view('educationFields.edit', compact('field'));
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);


        $field = EducationField::find($id);
        $field->update($validated);

        return redirect()->route('educationFields.index')->with('success', 'Eğitim alanı başarıyla güncellendi!');
    }


    public function destroy($id)
    {
        $field = EducationField::find($id);
        $field->delete();

        return redirect()->route('educationFields.index')->with('success', 'Eğitim alanı başarıyla silindi!');
    }
}
