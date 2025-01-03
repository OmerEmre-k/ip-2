<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{

public function index()
{
$languages = Language::all();
return view('languages.index', compact('languages'));
}


public function create()
{
return view('languages.create');
}


public function store(Request $request)
{

$request->validate([
'language' => 'required|string|max:255',
'proficiency_level' => 'required|string|max:255',
]);

Language::create($request->all());

return redirect()->route('languages.index');
}

public function edit($id)
{
$language = Language::findOrFail($id);
return view('languages.edit', compact('language'));
}

public function update(Request $request, $id)
{
$language = Language::findOrFail($id);

$language->update($request->all());

return redirect()->route('languages.index');
}

public function destroy($id)
{
$language = Language::findOrFail($id);
$language->delete();

return redirect()->route('languages.index');
}
}
