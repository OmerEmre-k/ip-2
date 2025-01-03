<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{

    public function index()
    {
        $experiences = Experience::all();
        return view('experiences.index', compact('experiences'));
    }


    public function create()
    {
        return view('experiences.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        Experience::create($validated);

        return redirect()->route('experiences.index')->with('success', 'Deneyim başarıyla eklendi!');
    }


    public function edit($id)
    {
        $experience = Experience::find($id);
        return view('experiences.edit', compact('experience'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $experience = Experience::find($id);
        $experience->update($validated);

        return redirect()->route('experiences.index')->with('success', 'Deneyim başarıyla güncellendi!');
    }


    public function destroy($id)
    {
        $experience = Experience::find($id);
        $experience->delete();

        return redirect()->route('experiences.index')->with('success', 'Deneyim başarıyla silindi!');
    }
}
