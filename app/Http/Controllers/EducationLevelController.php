<?php

namespace App\Http\Controllers;

use App\Models\EducationLevel;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{

    public function index()
    {
        $levels = EducationLevel::all();
        return view('educationLevels.index', compact('levels'));
    }


    public function create()
    {
        return view('educationLevels.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'level' => 'required|string|max:255',
        ]);

        EducationLevel::create($validated);

        return redirect()->route('educationLevels.index')->with('success', 'Eğitim seviyesi başarıyla eklendi!');  // Başarı mesajı ile index sayfasına yönlendir
    }


    public function edit($id)
    {
        $level = EducationLevel::find($id);
        return view('educationLevels.edit', compact('level'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'level' => 'required|string|max:255',
        ]);

        $level = EducationLevel::find($id);
        $level->update($validated);

        return redirect()->route('educationLevels.index')->with('success', 'Eğitim seviyesi başarıyla güncellendi!');
    }


    public function destroy($id)
    {
        $level = EducationLevel::find($id);
        $level->delete();

        return redirect()->route('educationLevels.index')->with('success', 'Eğitim seviyesi başarıyla silindi!');
    }
}
