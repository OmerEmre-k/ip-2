<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{

    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }


    public function create()
    {
        return view('skills.create');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'skill_name' => 'required|string|max:255',
        ]);


        Skill::create($validated);


        return redirect()->route('skills.index')->with('success', 'Yetenek başarıyla eklendi.');
    }


    public function edit($id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            return redirect()->route('skills.index')->with('error', 'Yetenek bulunamadı!');
        }

        return view('skills.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',  // Yetenek adı zorunlu ve 255 karakteri geçmemeli
        ]);

        $skill = Skill::find($id);
        if (!$skill) {
            return redirect()->route('skills.index')->with('error', 'Yetenek bulunamadı!');
        }


        $skill->update($validated);


        return redirect()->route('skills.index')->with('success', 'Yetenek başarıyla güncellendi.');
    }


    public function destroy($id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            return redirect()->route('skills.index')->with('error', 'Yetenek bulunamadı!');
        }

        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Yetenek başarıyla silindi.');
    }
}
