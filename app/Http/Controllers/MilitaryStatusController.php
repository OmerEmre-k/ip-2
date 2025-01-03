<?php

namespace App\Http\Controllers;

use App\Models\MilitaryStatus;
use Illuminate\Http\Request;

class MilitaryStatusController extends Controller
{

    public function index()
    {
        $militaryStatuses = MilitaryStatus::all();

        return view('military_statuses.index', compact('militaryStatuses'));
    }

    public function create()
    {
        return view('military_statuses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:50',
        ]);

        MilitaryStatus::create([
            'status' => $request->status,
        ]);

        return redirect()->route('militaryStatuses.index')->with('success', 'Askerlik durumu başarıyla eklendi.');
    }

    public function edit($id)
    {
        $militaryStatus = MilitaryStatus::findOrFail($id);

        return view('military_statuses.edit', compact('militaryStatus'));
    }

    public function update(Request $request, $id)
    {

        $militaryStatus = MilitaryStatus::findOrFail($id);

        $request->validate([
            'status' => 'required|string|max:50',
        ]);

        $militaryStatus->update([
            'status' => $request->status,
        ]);


        return redirect()->route('militaryStatuses.index')->with('success', 'Askerlik durumu başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $militaryStatus = MilitaryStatus::findOrFail($id);
        $militaryStatus->delete();

        return redirect()->route('militaryStatuses.index')->with('success', 'Askerlik durumu başarıyla silindi.');
    }
}
